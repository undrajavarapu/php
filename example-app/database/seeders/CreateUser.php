<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@danimoon.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
                'role'=>'admin',
            ],
            [
                'name' => 'User',
                'email' => 'normal@danimoon.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
                'role'=>'customer',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
