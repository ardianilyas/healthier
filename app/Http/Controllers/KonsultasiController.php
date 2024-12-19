<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index() {
        $currentMonth = date('F');

        return view('konsultasi.index', compact('currentMonth'));
    }
}
