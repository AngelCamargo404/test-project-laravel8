<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Angel',
            'email' => 'angel@correo.com',
            'password' => '$2y$10$xyytNth6OhoT/sq5QPX49uUysMX7EHlFEQZyLfUs/cH1kcQhrtAd6',
            'created_at' => '2023-02-06 20:55:27',
            'updated_at' => '2023-02-06 20:55:27',
            'rol' => 'cliente',
        ]);

        DB::table('users')->insert([
            'name' => 'Andres',
            'email' => 'andres@correo.com',
            'password' => '$2y$10$xyytNth6OhoT/sq5QPX49uUysMX7EHlFEQZyLfUs/cH1kcQhrtAd6',
            'created_at' => '2023-02-06 20:55:27',
            'updated_at' => '2023-02-06 20:55:27',
            'rol' => 'admin',
        ]);
    }
}
