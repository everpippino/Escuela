<?php

use Illuminate\Database\Seeder;
use App\Persona;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'apellido' => 'Petriella',
            'dni' => '11111111',
            'email' => 'eliaspetriella@gmail.com',
            'fecha_nacimiento' => '1980-01-01',
            'nombre' => 'Elias',
            'telefono' => '1010101010',
            'matricula_id' => '1'
        ]);
    }
}
