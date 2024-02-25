<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'imagen', 'estado', 'category_id', 'user_id'];

    //relcion 1:N con user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //relacion N:M con likes de los usuarios
    public function usersLike(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    //relacion 1:N con category
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    //Acessors y Muttadors
    public function titulo(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v),
        );
    }
    public function contenido(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v),
        );
    }
}
