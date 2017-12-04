<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PerfilTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(BancoTableSeeder::class);
        $this->call(DispositivoTableSeeder::class);
        $this->call(EstatusTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(TipoClienteTableSeeder::class);
    }
}
