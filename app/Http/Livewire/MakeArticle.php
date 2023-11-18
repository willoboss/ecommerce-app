<?php

namespace App\Http\Livewire;
use App\Models\Article;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithFileUploads;

class MakeArticle extends Component
{
    use WithFileUploads;

    public $lesCategories;
    public $libelle;
    public $description;

    public $prix;
    public $stock;

    public $photo;
    public $photoUrl;

    public $categorieId;

    public $lesArticles;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:7024', // 1MB Max
        ]);
        // Enregistrer la photo localement
    $path = $this->photo->store('photos');

    // Remplacer les '\' par '/'
    $path = str_replace('\\', '/', $path);

    // Récupérer le lien de stockage local
    $this->photoUrl = $this->photo->temporaryUrl();
    // dd($this->photoUrl);
    }

    public function addArticle(){


        $this->save();
        $article = new Article();
        $article->nom = $this->libelle;
        $article->description = $this->description;
        $article->prix = $this->prix;
        $article->stock = $this->stock;
        $article->photo = $this->photoUrl;
        $article->categorie_id = $this->categorieId;
        //  dd($article);

        $article->save();
    }

    public function Option(){

        $this->lesCategories = Categorie::all();
        $this->lesArticles = Article::all();

        // dd($this->lesCategories);
    }

    public function render()
    {
        $this->Option();
        return view('livewire.make-article');
    }
}
