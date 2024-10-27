<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Ardian Ilyas',
            'email' => 'ardian@developer.com',
            'password' => bcrypt('developer'),
        ]);

        Obat::factory(6)->create();

        $developer = Role::create(['name' => 'developer']);
        $admin = Role::create(['name' => 'Admin']);
        $pegawai = Role::create(['name' => 'Pegawai']);
        $kurir = Role::create(['name' => 'Kurir']);
        $dokter = Role::create(['name' => 'Dokter']);

        $user->assignRole($developer);
    }
}
