<?php

use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil')->insert([
            'nombre' => 'Administrador De Usuarios',
            'condicion' => true,
        ]);

        DB::table('perfil')->insert([
            'nombre' => 'Administrador De Seguridad',
            'condicion' => true,
        ]);

        DB::table('perfil')->insert([
            'nombre' => 'Call Center',
            'condicion' => true,
        ]);

        DB::table('perfil')->insert([
            'nombre' => 'Supervisor Call Center',
            'condicion' => true,
        ]);

        DB::table('perfil')->insert([
            'nombre' => 'Gestor De Reclamo',
            'condicion' => true,
        ]);

        DB::table('perfil')->insert([
            'nombre' => 'Supervisor De Gestor De Reclamo',
            'condicion' => true,
        ]);
    }
}
