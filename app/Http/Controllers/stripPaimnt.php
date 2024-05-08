<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Stripe;
use Stripe\Charge;
use App\Models\paiement;

class stripPaimnt extends Controller
{

    //
    public function stripPost(Request $request)
    {
        $stripe = new \Stripe\StripeClient("sk_test_51OxYmL1D2gj5qMyIVaw6XQ8wIhPOUyDt3wzs4qUZx7K5wwcJqQStkHLHoQRE2A2mYie0LgbVQuBhqDopEV8UuYCw00DwBxRgAy");

        $response = $stripe->checkout->sessions->create([
            'success_url' => $request->link,

            'customer_email' => $request->email,

            'payment_method_types' => ['link','card'],

            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' =>$request->name,

                            'description'=>$request->description,
                        ],
                        'unit_amount' => 100 * $request->price,
                        'currency' => 'USD',
                    ],
                    'quantity' => 1
                ],
               // "images"=>$request->img,
            ],

            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);

        return $response['url'];


    }

}
