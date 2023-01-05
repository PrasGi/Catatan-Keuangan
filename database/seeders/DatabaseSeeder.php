<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'pratama',
            'email' => 'pratama01@gmail.com',
            'password' => bcrypt('pratama')
        ]);

        Pemasukan::create([
            'user_id' => 1,
            'jumlah_pemasukan' => 15000
        ]);

        Pemasukan::create([
            'user_id' => 1,
            'jumlah_pemasukan' => 20000
        ]);

        Pengeluaran::create([
            'user_id' => 1,
            'jumlah_pengeluaran' => 15000
        ]);

        Pengeluaran::create([
            'user_id' => 1,
            'jumlah_pengeluaran' => 20000
        ]);
    }
}
