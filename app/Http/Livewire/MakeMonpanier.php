<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MakeMonpanier extends Component
{
    public $monpanier;
    public $statut;

    public function Option(){
        $this->monpanier = Commande::with('lignecommandes', 'lignecommandes.article', 'lignecommandes.statut')->where("user_id",Auth::user()->id)->get()->toArray();
    //   dd($this->monpanier);
    }

    public function render()
    {
        $this->Option();
        return view('livewire.make-monpanier');
    }
}
