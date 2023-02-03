<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Error;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Checkout\Session;
use Stripe\Exception\CardException;
use Stripe\Exception\InvalidRequestException;
use Stripe\Stripe;

class StripeController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if ($subscription = $user->subscription()) {
            $subscription = $subscription->asStripeSubscription();
            return view('stripe.index', compact('user', 'subscription'));
        } else {
            return view('stripe.index', compact('user'));
        }
    }

    public function showPaymentMethodForm()
    {
        return view('stripe.add-payment-method', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function addPaymentMethod(Request $request)
    {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        $user->deletePaymentMethods();
        $user->addPaymentMethod($request->payment_method);
        $user->updateDefaultPaymentMethod($request->payment_method);
        return to_route('stripe.subscribe')->with('success', 'Payment method added successfully!');
    }

    public function book(Request $request)
    {
        if ($request->payment_type == 'card') {
            $user = auth()->user();
            $user->createOrGetStripeCustomer();
            try {
                $user->charge(100 * $request->price, $request->payment_method);
            } catch (CardException $e) {
                return back()->with('error', $e->getMessage());
            } catch (InvalidRequestException $e) {
                return back()->with('error', 'Please refresh the page!');
            }
        }

        Appointment::create($request->all());
        return redirect()->route('appointment.list')
            ->with('success', 'Appointment created successfully.');
    }

    public function showSubscriptionForm()
    {
        $user = auth()->user();
        if (!$user->hasDefaultPaymentMethod()) {
            return to_route('stripe.add-payment-method');
        }
        $defaultPaymentMethod = $user->defaultPaymentMethod();
        $cardHolderName = $defaultPaymentMethod->billing_details->name;
        $last4 = $defaultPaymentMethod->card->last4;
        $exp_month = $defaultPaymentMethod->card->exp_month;
        $exp_year = $defaultPaymentMethod->card->exp_year;
        $brand = $defaultPaymentMethod->card->brand;
        $price = $this->getDefaultPrice()->unit_amount / 100;
        return view('stripe.subscribe', compact('cardHolderName', 'last4', 'exp_month', 'exp_year', 'brand', 'price'));
    }

    public function getDefaultPrice()
    {
        $product = $this->createOrGetProduct();
        return Cashier::stripe()->prices->retrieve($product->default_price);
    }

    public function createOrGetProduct()
    {
        if (count(Cashier::stripe()->products->all()->data) <= 0) {
            $product = Cashier::stripe()->products->create([
                'id' => 'cad_monthly_subscription',
                'name' => 'CAD Monthly Subscription',
            ]);
            $price = $this->createPrice($product->id);
            $product = Cashier::stripe()->products->update($product->id, [
                'default_price' => $price->id
            ]);
            return $product;
        } else {
            return Cashier::stripe()->products->retrieve('cad_monthly_subscription');
        }
    }

    public function createPrice($productId)
    {
        // Todo: Retrieve price from db
        $price = Cashier::stripe()->prices->create([
            'unit_amount' => 100 * 20,
            'currency' => 'usd',
            'recurring' => [
                'interval' => 'month',
            ],
            'product' => $productId,
        ]);
        return $price;
    }

    public function subscribe()
    {
        $user = auth()->user();
        $user->newSubscription(
            'default',
            $this->getDefaultPriceId(),
        )->add();
        return back()->with('success', 'You are a 911 breaking news subscriber now!');
    }

    public function getDefaultPriceId()
    {
        $product = $this->createOrGetProduct();
        return $product->default_price;
    }

    public function billingPortal()
    {
        $user = auth()->user();
        return $user->redirectToBillingPortal(route('stripe.index'));
    }

    public function renew()
    {
        $user = auth()->user();
        $user->subscription()->resume();
        return back()->with('success', 'Subscription renewed successfully!');
    }

    public function cancel()
    {
        $user = auth()->user();
        $user->subscription()->cancelNow();
        return back()->with('success', 'Subscription canceled successfully!');
    }

    public function checkout()
    {
        return auth()->user()
            ->newSubscription('default', $this->getDefaultPriceId())
            ->checkout([
                'success_url' => route('home') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('home'),
            ]);
    }

    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $checkout_session = Session::create([
                'line_items' => [
                    [
                        'price' => $request['priceId'],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'subscription',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel'),
            ]);
            return redirect($checkout_session->url);
        } catch (Error $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function notice()
    {
        $price = $this->getDefaultPrice()->unit_amount / 100;
        return view('subscriber.notice', compact('price'));
    }

}
