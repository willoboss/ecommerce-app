<?php

namespace App\Http\Livewire;

use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\Statut;
use Livewire\Component;

class MakeCommandeAdmin extends Component
{
    public $mesCommandes=[];

    public $lesStatuts;

    public $prix;
    public $code;
    public $quantite;
    public $nom;
    public $statut_id;
    public $commande_id;

    public function UpdateCommande(){
        LigneCommande::where('commande_id',$this->commande_id)->update([
            'statut_id'=>$this->statut_id
        ]);
    }

    public function Option(){

        $this->mesCommandes = Commande::with('lignecommandes.article','lignecommandes.statut')->get()->toArray();
        $this->lesStatuts = Statut::all();
    //    dd($this->mesCommandes);
    }
    public function render()
    {
        $this->Option();
        return view('livewire.make-commande-admin');
    }
}
