<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KaryawanRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class KaryawanController extends Controller
{
    public function index() {
        $users = User::role(['developer', 'admin', 'pegawai', 'kurir', 'dokter'])->get();
        return view('dashboard.karyawan.index', compact('users'));
    }

    public function create() {
        $roles = Role::whereIn('name', ['Admin', 'Pegawai', 'Kurir', 'Dokter'])->get();
        return view('dashboard.karyawan.create', compact('roles'));
    }

    public function store(KaryawanRequest $request) {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole($data['role']);

        notify()->success("User has been created", "Success");
        return redirect()->route('dashboard.karyawan.index');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        notify()->success("User has been deleted", "Success");
        return redirect()->route('dashboard.karyawan.index');
    }
}
