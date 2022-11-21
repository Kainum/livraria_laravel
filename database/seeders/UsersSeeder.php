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
                'name' => 'Luciano Elly',
                'email' => '172812@upf.br',
                'password' => bcrypt("12345678"),
                'cpf' => '484.774.833-61',
            ],
            [
                'name' => 'User user',
                'email' => 'user@user.com',
                'password' => bcrypt("12345678"),
                'cpf' => '824.894.860-98',
            ],
            [
                'name' => 'Leviano',
                'email' => 'leviano@email.com',
                'password' => bcrypt("12345678"),
                'cpf' => '855.968.380-12',
            ],
            [
                'name' => 'numero',
                'email' => '123456@123.com',
                'password' => bcrypt("12345678"),
                'cpf' => '582.812.634-23',
            ],
        ];

        foreach ($users as $key => $value) {
            User::factory()->create($value);
        }
    }
}
