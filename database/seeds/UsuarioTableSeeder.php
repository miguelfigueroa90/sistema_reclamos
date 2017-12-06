<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador De Usuarios
        DB::table('usuario')->insert([
            'cedula' => '8075258',
            'usuario' => 'mrivas',
            'nombre' => 'Martin',
            'apellido' => 'Rivas',
            'bloqueado' => false,
        ]);

        DB::table('usuario_departamento')->insert([
            'cedula' => '8075258',
            'codigo_departamento' => '4',
        ]);

        DB::table('usuario_perfil')->insert([
            'cedula' => '8075258',
            'codigo_perfil' => '1',
        ]);

        // Call Center
        DB::table('usuario')->insert([
            'cedula' => '19542658',
            'usuario' => 'dgarcia',
            'nombre' => 'Daniela',
            'apellido' => 'Garcia',
            'bloqueado' => false,
        ]);

        DB::table('usuario_departamento')->insert([
            'cedula' => '19542658',
            'codigo_departamento' => '2',
        ]);

        DB::table('usuario_perfil')->insert([
            'cedula' => '19542658',
            'codigo_perfil' => '3',
        ]);
        
        // Supervisor de Call Center
        DB::table('usuario')->insert([
            'cedula' => '14658798',
            'usuario' => 'mperez',
            'nombre' => 'Miguel',
            'apellido' => 'Perez',
            'bloqueado' => false,
        ]);

        DB::table('usuario_departamento')->insert([
            'cedula' => '14658798',
            'codigo_departamento' => '2',
        ]);

        DB::table('usuario_perfil')->insert([
            'cedula' => '14658798',
            'codigo_perfil' => '4',
        ]);

        // Gestor de medios de pagos
        DB::table('usuario')->insert([
            'cedula' => '6845987',
            'usuario' => 'gmatos',
            'nombre' => 'Gabriela',
            'apellido' => 'Matos',
            'bloqueado' => false,
        ]);

        DB::table('usuario_departamento')->insert([
            'cedula' => '6845987',
            'codigo_departamento' => '2',
        ]);

        DB::table('usuario_perfil')->insert([
            'cedula' => '6845987',
            'codigo_perfil' => '5',
        ]);

        // Supervisor de medios de pagos
        DB::table('usuario')->insert([
            'cedula' => '9548788',
            'usuario' => 'pvillahermosa',
            'nombre' => 'Pedro',
            'apellido' => 'Villahermosa',
            'bloqueado' => false,
        ]);

        DB::table('usuario_departamento')->insert([
            'cedula' => '9548788',
            'codigo_departamento' => '2',
        ]);

        DB::table('usuario_perfil')->insert([
            'cedula' => '9548788',
            'codigo_perfil' => '6',
        ]);

        // Administrador De Seguridad
        DB::table('usuario')->insert([
            'cedula' => '22784586',
            'usuario' => 'mhernandez',
            'nombre' => 'Michell',
            'apellido' => 'Hernandez',
            'bloqueado' => false,
        ]);

        DB::table('usuario_departamento')->insert([
            'cedula' => '22784586',
            'codigo_departamento' => '4',
        ]);

        DB::table('usuario_perfil')->insert([
            'cedula' => '22784586',
            'codigo_perfil' => '2',
        ]);
    }
}
