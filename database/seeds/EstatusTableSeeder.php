<?php

use Illuminate\Database\Seeder;

class EstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus')->insert([
            'tipo' => 'Pendiente',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'En Proceso',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'Completado',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'Procedente',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'No Procedente',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'En Trámites',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'Devoluciones',
            'condicion' => true,
        ]);

        DB::table('estatus')->insert([
            'tipo' => 'Anulado',
            'condicion' => true,
        ]);
    }
}
