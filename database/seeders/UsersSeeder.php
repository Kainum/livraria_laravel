<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'User user',
                'email' => 'user@user.com',
                'password' => bcrypt("12345678"),
            ],
            [
                'name' => 'Leviano',
                'email' => 'leviano@email.com',
                'password' => bcrypt("12345678"),
            ],
            [
                'name' => 'numero',
                'email' => '123456@123.com',
                'password' => bcrypt("12345678"),
            ],
        ];

        foreach ($users as $key => $value) {
            User::factory()->create($value);
        }
    }
}
