<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(2)->create();
        Pelanggan::factory(5)->create();
        
        User::create([
            'name' => 'Reyhan Tri Ramadan',
            'email' => 'Reyhantriramadan@gmail.com',
            'password' => bcrypt('masrey2246'),
            'username' => 'Masrey',
            'no_hp' => '0822-1972-5915',
            'alamat' => 'Gg haji Sulaeman no 16 Cianjur',
            'status' => 'Admin',
        ]);

        User::create([
            'name' => 'Reyhan Tri',
            'email' => 'masrey@gmail.com',
            'password' => bcrypt('masrey2246'),
            'username' => 'Reyhan',
            'no_hp' => '0822-1972-5915',
            'alamat' => 'Gg haji Sulaeman no 16 Cianjur',
            // 'status' => 'Operator',
        ]);

        Produk::create([
            'nama_produk' => 'Sampo'
        ]);
        
        Produk::create([
            'nama_produk' => 'Mie'
        ]);
    }


}
