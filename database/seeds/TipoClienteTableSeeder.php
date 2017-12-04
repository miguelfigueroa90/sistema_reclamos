<?php

use Illuminate\Database\Seeder;

class TipoClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cliente')->insert([
            'nombre' => 'V',
            'condicion' => true,
        ]);

        DB::table('tipo_cliente')->insert([
            'nombre' => 'J',
            'condicion' => true,
        ]);

        DB::table('tipo_cliente')->insert([
            'nombre' => 'G',
            'condicion' => true,
        ]);

        DB::table('tipo_cliente')->insert([
            'nombre' => 'E',
            'condicion' => true,
        ]);
    }
}
