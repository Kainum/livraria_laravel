<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
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
                'name' => 'Admin Leviano',
                'email' => 'admin@admin.com',
                'password' => bcrypt("12345678"),
            ],
        ];

        foreach ($users as $key => $value) {
            Admin::create($value);
        }

    }
}
