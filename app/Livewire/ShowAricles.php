<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateArticle;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowAricles extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    use WithFileUploads;

    //variable de busqueda
    public string $search = "";

    //variables de ordenar
    public string $orden = "desc";
    public string $campo = "id_art";

    public bool $openModalLikes = false;

    public bool $openUpdate = false;
    public UpdateArticle $form;

    public Article $articulo;

    #[On('crearOK')]
    public function render()
    {
        $articulos = Article::select('articles.id as id_art', 'imagen', 'nombre', 'estado', 'user_id', 'titulo', 'color')
            ->join('categories', 'categories.id', '=', 'category_id')
            ->where('user_id', auth()->user()->id)
            ->where(function ($q) {
                $q->where('titulo', 'like', "%$this->search%")
                    ->orWhere('estado', 'like', "%$this->search%")
                    ->orWhere('nombre', 'like', "%$this->search%");
            })
            ->orderBy($this->campo, $this->orden)
            ->paginate(5);

        $misLikes = Article::whereHas('usersLike', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->orderBy('titulo')->get();

        $misCategorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('livewire.show-aricles', compact('articulos', "misCategorias", "misLikes"));
    }

    //ORDENAR
    public function ordenar($campo)
    {
        $this->campo = $campo;
        $this->orden = ($this->orden == "asc" ? "desc" : "asc");
    }
    //BUSCAR
    //este funccion para buscar articulos en diferentes paginas
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //funccion para cambiar el estado del articulo
    public function cambiarEstado(Article $articulo)
    {
        $estado = ($articulo->estado == 'BORRADOR') ? 'PUBLICADO' : 'BORRADOR';
        $articulo->update([
            'estado' => $estado
        ]);
    }

    //BORRAR
    public function pedirPermisoBorrar(Article $articulo)
    {
        //dd($articulo);
        $this->authorize('delete', $articulo);
        $this->dispatch('borrarConfirmada', $articulo->id);
    }

    #[On('likeOK')]
    #[On('borrarOK')]
    public function delete(Article $articulo)
    {
        //dd($articulo);
        $this->authorize('delete', $articulo);
        if (basename($articulo->imagen) != 'noimagen.png') {
            Storage::delete($articulo->imagen);
        }
        $articulo->delete();
        $this->dispatch('mensaje', 'Articulo eliminado correctamente');
    }

    //UPDATE
    public function editar(Article $article)
    {
        $this->openUpdate = true;
        $this->articulo = $article;
        $this->form->setArticulo($article);
    }

    //LIKES
    public function closeModalLikes()
    {
        $this->openModalLikes = false;
    }
}
