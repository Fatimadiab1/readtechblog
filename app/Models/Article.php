<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'id',
        'titre',
        'description',
        'sous_titre',
        'contenu',
        'image',
        'video',
        'user_id',
        'category_id',
        'views',
        'likes',    ];

    public function category()
{
    return $this->belongsTo(Categorie::class, 'category_id');
}
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }


}
