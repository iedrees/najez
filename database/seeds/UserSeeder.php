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
            'password'       => bcrypt('112233'),
        ]);

        User::create([
            'name'           => 'Ahmad',
            'username'       => 'ahmad',
            'email'          => 'a@a.com',
            'password'       => bcrypt('112233'),
        ]);
    }
}
