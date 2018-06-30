<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\User;
use JavaScript;

class ChargeController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
           $stripeToken = $request->input('stripeToken');
           $plan = env('PLAN');
           $user = User::find(1);
           $user->newSubscription('main', $plan)->create($stripeToken);
           return redirect()->back();
        }

        if(view()->exists('stripe.index')){
            JavaScript::put([ 'token' => env('STRIPE_KEY') ]);
            return view('stripe.index');
        }
        return 404;
    }
}
