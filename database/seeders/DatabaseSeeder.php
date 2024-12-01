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
            'email' => 'ardian@developer.com',
            'password' => bcrypt('developer'),
            'is_membership' => true,
        ]);
        
        User::factory(5)->create();

        Obat::factory(6)->create();

        $developer = Role::create(['name' => 'Developer']);
        $admin = Role::create(['name' => 'Admin']);
        $pegawai = Role::create(['name' => 'Pegawai']);
        $kurir = Role::create(['name' => 'Kurir']);
        $dokter = Role::create(['name' => 'Dokter']);

        $user->assignRole($developer);

        // Plan::factory(3)->create();
        Plan::create([
            'name' => "Premium",
            'description' => "Premium membership plan",
            'price' => 100000
        ]);

        Plan::create([
            'name' => "Diamond",
            'description' => "Diamond membership plan",
            'price' => 150000
        ]);
        
        Membership::factory(3)->create();
        Cart::factory(1)->create();
        CartItem::factory(1)->create();
    }
}
