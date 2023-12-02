<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class MakeCommandeClient extends Component
{
    public $lesArticles=[];

    public $codeCommande;
    public $dateCommande;
    public $userId;
    public $lescodes;
    public $articleId;
    public $prixCommande = 0;
    public $quantiteCommande;



    public function Commande(){
            $commande = new Commande();
            $commande->code = $this->codeCommande;
            $commande->date_commande =date('Y-m-d H:i:s');
            $commande->user_id = $this->userId;
            // dd( $commande);
            $commande->save();

            $comm=Commande::where('code',$this->codeCommande)->get()->toArray();
            return $comm[0]['id'];
        }

        public function addCommande(){

            $ligne = new LigneCommande();
            $ligne->quantite =$this->quantiteCommande;
            $ligne->prix_commande = $this->prixCommande;
            $ligne->article_id =$this->articleId;
            $ligne->commande_id=$this->Commande();
            $ligne->statut_id=1;

            $ligne->save();

            return redirect()->route("panier");

        }


    public function Option(){
        $this->lesArticles = Article::all()->toArray();
        $this->lescodes = Commande::pluck('code');
    }

    public function render()
    {
        $this->Option();
        return view('livewire.make-commande-client');
    }
}
