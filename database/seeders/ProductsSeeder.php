<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'Nombre' => 'Producto 1',
            'Precio' => 123.45,
            'Impuesto' => 5,
        ]);

        DB::table('products')->insert([
            'Nombre' => 'Producto 2',
            'Precio' => 45.65,
            'Impuesto' => 15,
        ]);

        DB::table('products')->insert([
            'Nombre' => 'Producto 3',
            'Precio' => 39.73,
            'Impuesto' => 12,
        ]);

        DB::table('products')->insert([
            'Nombre' => 'Producto 4',
            'Precio' => 250.00,
            'Impuesto' => 8,
        ]);

        DB::table('products')->insert([
            'Nombre' => 'Producto 5',
            'Precio' => 59.35,
            'Impuesto' => 10,
        ]);
    }
}
