<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = User::create([
            'name'  => 'Admin',
            'email' => 'admin@phone.test',
            'password'  => bcrypt('admin1234'),
        ]);
        $admin->assignRole('Admin');
    }
}
