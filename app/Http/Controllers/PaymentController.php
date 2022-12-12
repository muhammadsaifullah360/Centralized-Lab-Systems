<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function call(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51MDpdLHx2TAsiIqQtPDx2UOXcUYBNljcoo3vZC11TtkdUbn3b2KHuFMzKOWB7yvKJXSaNZVbqgaHZu8N5rDIFD4Y00HJ6ArS8y');
        $customer = \Stripe\Customer::create(array(
            'name' => 'test',
            'description' => 'test description',
            'email' => 'fahadthereal555@gmail.com',
            'source' => $request->input('stripeToken'),
            "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]

        ));
        try {
            \Stripe\Charge::create ( array (
                "amount" => 50 * 100,
                "currency" => "usd",
                "customer" =>  $customer["id"],
                "description" => "Test payment."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return view ( 'patient.payment.checkout' );
        } catch ( \Stripe\Error\Card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'patient.payment.checkout' );
        }
    }
}
