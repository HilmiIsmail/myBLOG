<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearArticulo extends Component
{
    use WithFileUploads;
    public bool $openCrear = false;

    #[Validate(['required', 'string', 'min:3', 'unique:articles,titulo'])]
    public string $titulo = "";

    #[Validate(['required', 'string', 'min:10'])]
    public string $contenido = "";

    #[Validate(['nullable', 'image', 'max:2048'])]
    public $imagen;

    #[Validate(['nullable'])]
    public string $estado = "";

    #[Validate(['required', 'exists:categories,id'])]
    public $category_id;

    public function render()
    {
        $misCategorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('livewire.crear-articulo', compact('misCategorias'));
    }
    public function store()
    {
        $this->validate();
        Article::create([
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'estado' => ($this->estado) ? "PUBLICADO" : "BORRADOR",
            'imagen' => ($this->imagen) ? $this->imagen->store('articulos') : 'noimagen.png',
            'category_id' => $this->category_id,
            'user_id' => auth()->user()->id,
        ]);
        $this->dispatch('crearOK')->to(ShowAricles::class);
        $this->dispatch('mensaje', 'Artículo creado con éxito');
        $this->limpiarCrear();
    }

    public function limpiarCrear()
    {
        $this->reset(['openCrear', 'titulo', 'contenido', 'estado', 'category_id', 'imagen']);
    }
}
