<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalasRequest;
use App\Models\Balasan;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalasanController extends Controller
{
    public function index() {
        $month = now()->month;
        $consultation = Konsultasi::whereMonth('created_at', $month)->with('user')->latest()->get();
        return view('balasan.index', compact('consultation'));
    }

    public function balas(Konsultasi $konsultasi, BalasRequest $request) {
        $userId = Auth::id();

        Balasan::create([
            'konsultasi_id' => $konsultasi->id,
            'user_id' => $userId,
            'balasan' => $request->balasan,
        ]);

        $konsultasi->status = 'dibalas';
        $konsultasi->save();

        return redirect()->route('balasan.index');
    }
}
