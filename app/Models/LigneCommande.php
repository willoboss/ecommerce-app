<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function commande(){
        return $this->belongsTo(Commande::class);
    }

    public function statut(){
        return $this->belongsTo(Statut::class);
    }
}
