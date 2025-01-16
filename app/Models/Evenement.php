<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = [
        'nom',
        'image',
        'contenu',
        'date',
        'pays_id',
        'user_id',
    ];
    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
