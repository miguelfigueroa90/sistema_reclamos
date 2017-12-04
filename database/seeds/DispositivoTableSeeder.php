<?php

use Illuminate\Database\Seeder;

class DispositivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispositivo')->insert([
            'tipo' => 'ATM',
            'condicion' => true,
        ]);

        DB::table('dispositivo')->insert([
            'tipo' => 'POS',
            'condicion' => true,
        ]);
    }
}
