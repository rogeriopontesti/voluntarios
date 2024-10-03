<?php

namespace Database\Seeders;
use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;



class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        User::factory()->count(50)->create();
        
//        DB::table('users')->insert([
//            'id' => Str::uuid(),
//            'nome' => "Rogerio Pontes",
//            'email' => "rogeriopontesti@gmail.com",
//            'password' => Hash::make('123456789'),
//            'telefone' => "48991877781",
//            'cidade' => "Angra dos Reis",
//            'estado' => "Rio de Janeiro",
//            'perfil' => "candidato",
//            'tipo_de_usuario' => "administrador",
//        ]);
    }
}
