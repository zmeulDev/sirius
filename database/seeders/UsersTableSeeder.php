<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-10-04 06:07:48',
                'badge'              => '',
                'car_plate'          => '',
                'verification_token' => '',
            ],
        ];

        
        User::insert($users);
    }
}
