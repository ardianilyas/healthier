<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index() {
        $transactions = Auth::user()->transactions;
        return view('dashboard.transaksi.index', compact('transactions'));
    }
}
