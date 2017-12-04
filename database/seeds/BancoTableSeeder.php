<?php

use Illuminate\Database\Seeder;

class BancoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banco')->insert([
            'codigo_banco' => '0166',
            'nombre' => 'Banco Agrícola de Venezuela',
            'condicion' => true,
        ]);

        DB::table('banco')->insert([
            'codigo_banco' => '0134',
            'nombre' => 'Banesco',
            'condicion' => true,
        ]);

        DB::table('banco')->insert([
            'codigo_banco' => '0108',
            'nombre' => 'Banco Provincial',
            'condicion' => true,
        ]);

        DB::table('banco')->insert([
            'codigo_banco' => '0105',
            'nombre' => 'Banco Mercantil',
            'condicion' => true,
        ]);

        DB::table('banco')->insert([
            'codigo_banco' => '0102',
            'nombre' => 'Banco de Venezual',
            'condicion' => true,
        ]);
    }
}
