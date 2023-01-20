<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\Http\Request;
use Stripe\Charge;

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
            Charge::create ( array (
                "amount" => 50 * 100,
                "currency" => "pkr",
                "customer" =>  $customer["id"],
                "description" => "Test payment."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return view ( 'patient.payment.checkout' );
        } catch ( \Exception $e ) {
            Session::flash ( 'fail-message', $e->getMessage() );
            return view ( 'patient.payment.checkout' );
        }
    }
}
