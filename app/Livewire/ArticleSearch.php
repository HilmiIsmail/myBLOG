<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleSearch extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $misArticulos = Article::where('estado', 'PUBLICADO')
            ->where('titulo', 'LIKE', "%{$this->search}%")
            ->orderByDesc('id')
            ->paginate(5);

        return view('livewire.article-search', compact('misArticulos'));
    }

    public function like($articleId)
    {
        $article = Article::find($articleId);
        $article->usersLike()->toggle(auth()->user()->id);
    }
}
