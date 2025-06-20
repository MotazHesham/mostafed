<?php

namespace Database\Seeders\Tenant;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'phone'          => '',
                'phone_2'        => '',
                'identity_num'   => '',
                'username'       => '',
                'user_type'      => 'staff',
            ],
        ];

        User::insert($users);
    }
}
