<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KonsultasiRequest;
use App\Models\MembershipLimit;

class KonsultasiController extends Controller
{
    public function index() {
        return view('konsultasi.index');
    }

    public function konsultasi(KonsultasiRequest $request) {
        $userId = Auth::id();
        $membership = Membership::where('user_id', $userId)->where('status', 'active')->first();
        $membershipLimit = MembershipLimit::where('membership_id', $membership->id)->first();
        
        if($membershipLimit->used >= $membershipLimit->limit) {
            return redirect()->back()->withErrors(['konsultasi' => 'Limit konsultasi sudah melebihi batas untuk periode membership saat ini']);
        } 

        Konsultasi::create([
            'user_id' => $userId,
            'konsultasi' => $request->konsultasi,
        ]);

        $membershipLimit->used += 1;
        $membershipLimit->save();

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
