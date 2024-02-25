<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creamos 50 artículos
        $articulos = Article::factory(50)->create();
        // Asignar likes aleatorios a cada artículo
        foreach ($articulos as $articulo) {
            $articulo->usersLike()->attach(self::devolverIdsUsuariosRandom());
        }
    }

    private function devolverIdsUsuariosRandom(): array
    {
        $usuarios = [];
        $idsusuarios = User::pluck('id')->toArray();
        $indices = array_rand($idsusuarios, random_int(2, count($idsusuarios)));
        foreach ($indices as $indice) {
            $usuarios[] = $idsusuarios[$indice];
        }

        return $usuarios;
    }
}
