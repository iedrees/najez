<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'           => 'Admin',
            'username'       => 'admin',
            'email'          => 'admin@admin.com',
            'employee_num'   => '1',
            'password'       => bcrypt('112233'),
        ]);

        User::create([
            'name'           => 'Ahmad',
            'username'       => 'ahmad',
            'email'          => 'a@a.com',
            'employee_num'   => '2',
            'password'       => bcrypt('112233'),
        ]);

        User::create([
            'name'           => 'User',
            'username'       => 'user',
            'email'          => 'u@u.com',
            'employee_num'   => '3',
            'password'       => bcrypt('112233'),
        ]);
    }
}
