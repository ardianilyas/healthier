<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class KaryawanController extends Controller
{
    public function index() {
        $users = User::role(['developer', 'admin', 'pegawai', 'kurir', 'dokter'])->get();
        return view('dashboard.karyawan.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('dashboard.karyawan.create', compact('roles'));
    }
}
