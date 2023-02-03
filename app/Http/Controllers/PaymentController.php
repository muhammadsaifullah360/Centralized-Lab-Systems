<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentController extends Controller
{

    public function index()
    {
        return view('patient.payment.checkout');
    }

    public function call(Request $request)
    {
        Stripe::setApiKey('sk_test_51MDpdLHx2TAsiIqQtPDx2UOXcUYBNljcoo3vZC11TtkdUbn3b2KHuFMzKOWB7yvKJXSaNZVbqgaHZu8N5rDIFD4Y00HJ6ArS8y');
        $customer = Customer::create(array(
            'name' => 'test',
            'description' => 'test description',
            'email' => 'fahadthereal555@gmail.com',
            'source' => $request->input('stripeToken'),
            "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]
        ));
        try {
            $amount = 100 * 200;
            Charge::create(array(
                "amount" => $amount,
                "currency" => "pkr",
                "customer" => $customer["id"],
                "description" => "Test payment."
            ));
            Session::flash('success-message', 'Payment done successfully !');
//            $request->validate([
//                'test' => 'required',
//                'price' => 'required',
//                'address' => 'required',
//                'phone' => 'required',
//                'user_id' => 'required',
//                'lab_id' => 'required',
//                'payment_type' => 'required'
//            ]);
            Appointment::create($request->all());
            return redirect()->route('appointment.list')
                ->with('success', 'Appointment created successfully.');
//            return view('patient.appointment');
        } catch (\Exception $e) {
            Session::flash('fail-message', $e->getMessage());
            return view('patient.payment.checkout');
        }
    }
}
