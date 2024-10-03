<?php

namespace Database\Seeders;

use App\Models\Evento;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Str;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Evento::factory()->count(50)->create();
        
//        DB::table('eventos')->insert([
//            'id' => Str::uuid(),
//            'titulo' => "Evento Teste",
//            'evento' => "O evento é para testar o Seeder",
//            'data' => date("Y-m-d"),
//            'hora' => date("H:m:s"),
//            'local' => "Superientendência de Tecnologia da Informação",
//            'created_at' => date("Y-m-d H:i:s"),
//            'updated_at' => date("Y-m-d H:i:s"),
//        ]);
    }
}
