<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable =[
        'image',
        'nom',
        'description',
    ];
    public function articles()
{
    return $this->hasMany(Article::class, 'category_id'); // Utilisez 'category_id'
}

}
