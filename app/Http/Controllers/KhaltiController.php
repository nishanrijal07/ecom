<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Dipesh79\LaravelKhalti\LaravelKhalti;
use Illuminate\Http\Request;

class KhaltiController extends Controller
{
    public function khaltiPayment(Request $request)
    {
        $khalti = new LaravelKhalti();
        $amount = 123; // In Paisa
        $order_id = 251264889; // Your Unique Order Id
        $order_name = "Order Name";
        
        $payment_response = $khalti->khaltiCheckout($amount, $order_id, $order_name);
        
        $pidx = $payment_response['pidx']; // Store this to your db for future reference.
        $url = $payment_response['url'];
        return redirect($url);
    }

    public function callBackFunction(Request $request)
    {
        // Success Payment
        if ($request->pidx) {
            $payment = Payment::where('your_pidx_id', $request->pidx)->first();
            $payment->status = "Success";
            $payment->save();
        } else {
            // Payment Failed
        }
    }

    public function checkStatus($pidx)
    {
        $khalti = new LaravelKhalti();
        $status = $khalti->checkStatus($pidx);

        // The status will look like this
        // array:6 [▼
        //  "pidx" => "pidx id"
        //  "total_amount" => 2000 // In Paisa
        //  "status" => "Completed"
        //  "transaction_id" => "some transaction id unique for khalti"
        //  "fee" => 60
        //  "refunded" => false
        // ]

        // Now you can update your payment status as per need.
    }
}