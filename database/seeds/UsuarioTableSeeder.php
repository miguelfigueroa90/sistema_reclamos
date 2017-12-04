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
        factory(App\Usuario::class, 5)->create()->each(function($usuario){
        	DB::table('usuario_departamento')->insert([
	            'cedula' => $usuario->cedula,
	            'codigo_departamento' => '4',
	        ]);

	        DB::table('usuario_perfil')->insert([
	            'cedula' => $usuario->cedula,
	            'codigo_perfil' => '1',
	        ]);
        });
    }
}
