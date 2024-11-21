<?php

namespace App\Http\Controllers;

use App\Models\Obat;

class PesanObatController extends Controller
{
    public function index() {
        $listObat = Obat::all();
        return view('pesan.index', compact('listObat'));
    }

    public function detail(Obat $obat) {
        return view('pesan.detail', compact('obat'));
    }
}
