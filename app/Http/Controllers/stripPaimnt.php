<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Stripe;
use Stripe\Charge;
class stripPaimnt extends Controller
{
    //
    public function stripPost(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

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
