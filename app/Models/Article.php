<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'id',
        'titre',
        'sous_titre',
        'contenu',
        'image',
        'video',
    ];

    public function category() {
        return $this->belongsTo(Categorie::class);
    }

}
