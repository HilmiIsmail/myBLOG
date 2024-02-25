<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'fútbol' => '#FBA834',
            'naturaleza' => '#9BCF53',
            'animales' => '#EE99C2',
            'comida' => '#9195F6',
            'anime' => '#EBF400',
        ];
        foreach ($categorias as $nombre => $color) {
            Category::create([
                'nombre' => $nombre,
                'color' => $color
            ]);
        }
    }
}
