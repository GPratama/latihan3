<?php

namespace Database\Seeders;

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
        User:: create([
            'name'=>'gilang',
            'email'=>'gg@localhost.com',
            'password'=>bcrypt('admin'),
            'role'=>'admin'
        ]);
        User:: create([
            'name'=>'gilang',
            'email'=>'gg@gg.com',
            'password'=>bcrypt('customer'),
            'role'=>'customer'
        ]);
    }
}
