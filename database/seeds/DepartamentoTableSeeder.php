<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
            'nombre' => 'Medios De Pagos Y Canales Electrónicos O Canales Electrónicos',
            'condicion' => true,
        ]);

        DB::table('departamento')->insert([
            'nombre' => 'Gestión Al Cliente O Call Center',
            'condicion' => true,
        ]);

        DB::table('departamento')->insert([
            'nombre' => 'Control De Accesos',
            'condicion' => true,
        ]);

        DB::table('departamento')->insert([
            'nombre' => 'Seguridad De Base De Datos',
            'condicion' => true,
        ]);
    }
}
