<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateArticle extends Form
{
    public ?Article $artiulo;
    public string $titulo = "";
    public string $contenido = "";
    public $imagen;
    public string $estado;
    public  $category_id;

    public function setArticulo(Article $articulo)
    {
        $this->artiulo = $articulo;
        $this->titulo = $articulo->titulo;
        $this->contenido = $articulo->contenido;
        $this->imagen = $articulo->imagen;
        $this->estado = $articulo->estado;
        $this->category_id = $articulo->category_id;
    }
}
