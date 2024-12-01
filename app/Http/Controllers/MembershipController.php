<?php

namespace App\Http\Controllers;

use App\Models\Plan;
// use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index() {
        $plans = Plan::all();
        return view('membership.index', compact('plans'));
    }

    public function buy(Plan $plan) {
        return view('membership.buy', compact('plan'));
    }
}
