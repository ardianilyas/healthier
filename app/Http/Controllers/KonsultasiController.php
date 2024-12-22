<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonsultasiRequest;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index() {
        return view('konsultasi.index');
    }

    public function konsultasi(KonsultasiRequest $request) {
        $userId = Auth::id();

        $konsultasi = Konsultasi::create([
            'user_id' => $userId,
            'konsultasi' => $request->konsultasi,
        ]);

        notify()->success('Konsultasi berhasil dikirim');
        return redirect()->back();
    }

    public function riwayat() {
        $userId = Auth::id();
        $month = now()->month;
        $consultations = Konsultasi::where('user_id', $userId)->whereMonth('created_at', $month)->latest()->get();

        return view('konsultasi.riwayat', compact('consultations'));
    }

    public function detail(Konsultasi $konsultasi) {
        $listBalasan = $konsultasi->balasan;
        return view('konsultasi.detail', compact('konsultasi', 'listBalasan'));
    }
}
