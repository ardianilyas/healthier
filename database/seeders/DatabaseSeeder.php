<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Membership;
use App\Models\Obat;
use App\Models\Plan;
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
            'email' => 'admin@developer.com',
            'password' => bcrypt('developer'),
            'is_membership' => false,
        ]);
        
        User::factory(5)->create();

        Obat::factory(6)->create();

        $developer = Role::create(['name' => 'Developer']);
        $admin = Role::create(['name' => 'Admin']);
        $dokter = Role::create(['name' => 'Dokter']);

        $user->assignRole($developer);
        $userDokter = User::factory()->create([
            'name' => 'Leonore Lynn',
            'email' => 'dokter@healthier.com',
            'password' => bcrypt('password'),
            'is_membership' => false,
        ]);
        $userDokter->assignRole($dokter);

        Plan::create([
            'name' => "Premium",
            'description' => "Premium membership plan 2 kali konsultasi per bulan",
            'price' => 100000,
            'limit' => 2,
        ]);

        Plan::create([
            'name' => "Diamond",
            'description' => "Diamond membership plan 4 kali konsultasi per bulan",
            'price' => 180000,
            'limit' => 4,
        ]);
    }
}
