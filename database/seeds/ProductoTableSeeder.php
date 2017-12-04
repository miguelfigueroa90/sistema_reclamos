<?php

use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto')->insert([
            'nombre' => 'Tarjeta de débito',
            'tipo' => 'TDD',
            'condicion' => true,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Tarjeta de buen productor',
            'tipo' => 'TBP',
            'condicion' => true,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Tarjeta de alimentación',
            'tipo' => 'TDA',
            'condicion' => true,
        ]);
    }
}
