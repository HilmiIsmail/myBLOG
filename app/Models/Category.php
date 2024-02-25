<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'color'];

    //relacion 1:N con Article
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    //Acessors y Muttadors
    public function nombre(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v),
        );
    }
}
