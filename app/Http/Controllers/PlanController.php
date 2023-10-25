<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('plans', [
            'plans' => Plan::all()
        ]);
    }

    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view('subscription', compact('plan', 'intent'));
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
        $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);
        return view('subscription_success', compact('plan'));
    }
}
