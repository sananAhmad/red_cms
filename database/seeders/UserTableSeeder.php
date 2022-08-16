<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arr = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
            ],
            [
                'name' => 'admin1',
                'email' => 'admin@gmail.com1',
                'password' => Hash::make('password'),
                'is_admin' => 0,
            ]

        ];
        User::insert($arr);
    }
}
