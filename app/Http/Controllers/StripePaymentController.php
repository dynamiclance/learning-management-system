<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request) {
        // dd("test");

        $validator = Validator::make($request->all(), [
            'card_number' => 'required',
            'card_expiry_date' => 'required',
            'card_cvc' => 'required',
            'amount' => 'required',
            'invoice_id' => 'required| integer',
            ]);

            if ($validator->fails()) { 
                flash()->addWarning('please fill the form');
               return redirect()->back();
            } else {

            
                $stripe = new StripeClient(env('STRIPE_SECRET'));
                //dd($stripe);

                try {
                    $token = $stripe->tokens->create([
                        'card' => [
                            'number' => $request->card_number,
                            'exp_month' => explode('/', $request->card_expiry_date)[0],
                            'exp_year' => explode('/', $request->card_expiry_date)[1],
                            'cvc' => $request->card_ccv,
                        ],
                    ]);


                    $charge = $stripe->charges->create([
                        'amount' => intval($request->amount * 100),
                        'currency' => 'usd',
                        'description' => 'payment for invoice id #' . $request->invoice_id,
                        'source' => $token['id']
                    ]);

                   // dd($charge);

                   Payment::create([
                    'amount' => $request->amount,
                    'invoice_id' => $request->invoice_id
                   ]);

                   return redirect()->back();


                   flash()->addSuccess('payment successful');



                } catch (\Exception $e) {
                    flash()->addWarning('Invalid card details');
                    return redirect()->back();
                }

                
                   
            }
    }


}
