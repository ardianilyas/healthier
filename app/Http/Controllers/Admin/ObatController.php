<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ObatRequest;
use App\Models\Obat;
// use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() {
        $listObat = Obat::latest()->get();
        return view('dashboard.admin.obat.index', compact('listObat'));
    }

    public function create() {
        return view('dashboard.admin.obat.create');
    }

    public function store(ObatRequest $request) {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move('storage/obat', $imageName);
            $data['image'] = $imageName;
        }

        Obat::create($data);

        return redirect()->route('dashboard.obat.index');
    }

    public function edit(Obat $obat) {
        return view('dashboard.admin.obat.edit', compact('obat'));
    }

    public function update(ObatRequest $request, Obat $obat) {
        $obat->update($request->validated());

        return redirect()->route('dashboard.obat.index');
    }

    public function destroy(Obat $obat) {
        if($obat->image) {
            unlink('storage/obat/'. $obat->image); // Delete the file from the storage directory if it exists.
        }
        $obat->delete();
        return redirect()->route('dashboard.obat.index');
    }
}
