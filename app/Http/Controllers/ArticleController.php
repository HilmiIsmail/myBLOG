<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $articulo)
    {
        return view('articles.detalles', compact('articulo'));
    }
}
