<div x-data="{
    cartOpen: false,
    isOpen: false,
    articleId:@entangle('articleId').defer,
    lesArticles:@entangle('lesArticles').defer,
    lescodes:@entangle('lescodes').defer,
    codeCommande:@entangle('codeCommande').defer,
    userId:@entangle('userId').defer,
    prixCommande:@entangle('prixCommande').defer,
    quantiteCommande:@entangle('quantiteCommande').defer,
    lesCategories:@entangle('lesCategories').defer,
    libelle:'',
    prix:'',
    stock:'',
    photo:'',
    nombre:1,


    boolModal:false,

    searchTerm: '',
    searchTermC:'',
    filterItems(id) {
        console.log(this.lesCategories)

        const result= Object.values(this.lesCategories).filter(item => item.id === id)
        this.searchTerm=result[0].libelle
        console.log(this.searchTermC)
    },


    incrementeNombre(){
        if (this.nombre>=1) {
            this.nombre++
            this.prixCommande = this.prix
            this.prixCommande = this.prix * this.nombre
        }

    },

    decrementeNombre(){
        if (this.nombre>=2) {
            this.nombre--
            this.prixCommande = this.prix
            this.prixCommande = this.prix * this.nombre
        }

    },

    getRandomCode() {
        return Math.floor(Math.random() * 9000000000) + 1000000000;
    },

     isCodeUnique(code,lescodes) {
        const str = code.toString();
        const val = Object.values(lescodes);
        return !val.includes(str);
    },

    generateCode() {
      // Si vous avez déjà des codes existants, vous pouvez les stocker dans le tableau existingCodes

      let generatedCode = this.getRandomCode();
      while (!this.isCodeUnique(generatedCode, this.lescodes)) {
        generatedCode = this.getRandomCode();
      }

      this.codeCommande = generatedCode;
    },

    Commande(userid){
        this.userId = userid
        this.quantiteCommande= this.nombre
        this.generateCode()
        console.log(this.userId)
        this.EnregisterData()
    },

    ResearchArticle(id){

        const result= Object.values(this.lesArticles).filter(item => item.id === id)

        this.boolModal=!this.boolModal
        console.log(this.boolModal)
        this.libelle=result[0].nom
        this.prix=result[0].prix
        this.stock=result[0].stock
        this.photo=result[0].photo
    this.prixCommande = this.prix
    this.articleId = id
        if(!this.boolModal){
                this.prixCommande = this.prix
                this.nombre = 1
            }
    },

    EnregisterData: async function(){
                await @this.addCommande().then(value => {
                    data = JSON.parse(value);
                });
            }



    }" class="bg-white"
    >
        <header>
            <div class="container mx-auto px-6 py-3">
                <nav class="sm:flex sm:justify-center sm:items-center mt-4">

                    <div class="flex flex-col sm:flex-row">

                        @foreach ($lesCategories as $categorie)
                        <p class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" x-on:click="filterItems({{  $categorie['id'] }})" href="#">{{ $categorie['libelle'] }}</p>
                        @endforeach

                    </div>
                </nav>
                <div class="relative mt-6 max-w-lg mx-auto">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>

                    <input x-model="searchTerm" class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" placeholder="Search">
                </div>
            </div>
        </header>
        <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-medium text-gray-700">Mon Panier</h3>
                <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <hr class="my-3">
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded" x-bind:src="photo" alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600" x-text="libelle"></h3>
                        <div class="flex items-center mt-2">
                            <button x-on:click='incrementeNombre()' class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <span class="text-gray-700 mx-2" x-text="nombre" >2</span>
                            <button x-on:click="decrementeNombre()" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600" x-text="prixCommande"></span><span class="text-gray-600">fcfa</span>
            </div>

            <div class="mt-8 ">
                <form class="flex items-center justify-center">
                    <input class="form-input w-48" type="text" placeholder="Add promocode">
                    <button class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <span>Apply</span>
                    </button>
                </form>
            </div>
            <a class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <span x-on:click="Commande({{ Auth::user()->id }})">Passer la commande</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Articles</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <template x-for="article in lesArticles">
                            <div   x-show="(article.nom.toLowerCase().includes(searchTerm.toLowerCase()) || article.categorie.libelle.toLowerCase().includes(searchTerm.toLowerCase()))" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                <div class="flex items-end justify-end h-56 w-full bg-cover"  :style="'background-image: url(' + article.id + ');'">
                                    <button   x-on:click="ResearchArticle(article.id)"   @click="cartOpen = !cartOpen" class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        COMMANDER
                                    </button>
                                </div>
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase" x-text="article.nom"></h3>
                                    <span class="text-gray-500 mt-2" x-text="article.prix"></span><span> Fcfa</span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Fashions</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Chanel</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Man Mix</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1532667449560-72a95c8d381b?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Classic watch</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1590664863685-a99ef05e9f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=345&q=80')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">woman mix</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-gray-200">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
                <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>
</div>
