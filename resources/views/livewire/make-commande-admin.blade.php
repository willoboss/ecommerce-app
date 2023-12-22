<div x-data="{
    boolModal: false,
    mesCommandes:@entangle('mesCommandes').defer,
    prix:@entangle('prix').defer,
    code:@entangle('code').defer,
    quantite:@entangle('prix').defer,
    nom:@entangle('prix').defer,
    statut_id:@entangle('statut_id').defer,
    commande_id:@entangle('commande_id').defer,
    photo:'',
    searchTerm:'',


     checkUpdate(id){
        this.boolModal = true
        const result= Object.values(this.mesCommandes).filter(item => item.id === id);
        console.log(result)
        console.log(this.mesCommandes)
        this.commande_id=id
        this.nom= result[0].lignecommandes[0].article.nom
        this.code= result[0].code
        this.prix= result[0].lignecommandes[0].prix_commande
        this.quantite= result[0].lignecommandes[0].quantite
        this.photo= result[0].lignecommandes[0].article.photo
     },


     checkClose(){
        this.boolModal=false
     },
     EnregisterData: async function(){
                await @this.UpdateCommande().then(value => {
                    data = JSON.parse(value);
                    this.checkClose()
                });
            }

     }"
     >

<div class="container max-w-6xl px-4 mx-auto sm:px-8">
    <div class="py-8">
        <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
            <h2 class="text-2xl leading-tight">
                Mes commandes
            </h2>
            <div class="text-end">
                <form class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                    <div class=" relative ">
                        <input x-model="searchTerm" type="text" id="&quot;form-subscribe-Filter" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="name"/>
                        </div>
                        <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" type="submit">
                            Recherche
                        </button>
                    </form>
                </div>
            </div>
            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Article
                                </th>
                                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Qté
                                </th>
                                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Prix
                                </th>
                                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Date
                                </th>
                                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    statuts
                                </th>
                                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <template x-for="commande in mesCommandes">
                           <tr x-show="(commande.lignecommandes[0].article.nom.toLowerCase().includes(searchTerm.toLowerCase()) || commande.lignecommandes[0].statut.libelle.toLowerCase().includes(searchTerm.toLowerCase()) || commande.date_commande.toLowerCase().includes(searchTerm.toLowerCase()))">
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="relative block">
                                            <img alt="profil" x-bind:src="commande.lignecommandes[0].article.photo"  class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>

                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap" x-text="commande.lignecommandes[0].article.nom">

                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 text-center whitespace-no-wrap" x-text="commande.lignecommandes[0].quantite">

                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap" x-text="commande.lignecommandes[0].prix_commande">
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap" x-text="commande.date_commande">
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">

                                    <span x-bind:class="{
                                        'bg-green-500': commande.lignecommandes[0].statut.libelle === 'Livrée',
                                        'bg-red-500': commande.lignecommandes[0].statut.libelle === 'annulée',
                                        'bg-blue-500': commande.lignecommandes[0].statut.libelle === 'en cours de traitement',
                                        'bg-orange-500': commande.lignecommandes[0].statut.libelle === 'en expédition'
                                    }"

                                        class="relative rounded-full inline-block px-3 py-1 font-semibold leading-tight text-white"
                                    >
                                        <span aria-hidden="true" class="absolute inset-0 rounded-full opacity-50">
                                        </span>
                                        <span class="relative" x-text="commande.lignecommandes[0].statut.libelle">
                                        </span>
                                    </span>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <button x-on:click="checkUpdate(commande.id)" data-modal-target="select-modal" data-modal-toggle="select-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Modifier
                                  </button>
                            </td>
                        </tr>
                    </template>



                        </tbody>
                    </table>
                    <div class="flex flex-col items-center px-5 py-5 bg-white xs:flex-row xs:justify-between">
                        <div class="flex items-center">
                            <button type="button" class="w-full p-4 text-base text-gray-600 bg-white border rounded-l-xl hover:bg-gray-100">
                                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                                    </path>
                                </svg>
                            </button>
                            <button type="button" class="w-full px-4 py-2 text-base text-indigo-500 bg-white border-t border-b hover:bg-gray-100 ">
                                1
                            </button>
                            <button type="button" class="w-full px-4 py-2 text-base text-gray-600 bg-white border hover:bg-gray-100">
                                2
                            </button>
                            <button type="button" class="w-full px-4 py-2 text-base text-gray-600 bg-white border-t border-b hover:bg-gray-100">
                                3
                            </button>
                            <button type="button" class="w-full px-4 py-2 text-base text-gray-600 bg-white border hover:bg-gray-100">
                                4
                            </button>
                            <button type="button" class="w-full p-4 text-base text-gray-600 bg-white border-t border-b border-r rounded-r-xl hover:bg-gray-100">
                                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




  <!-- Main modal -->
  <div class="fixed  inset-0 z-50 flex items-center justify-center" x-show="boolModal" >
    <div class="p-4 bg-white rounded shadow">
      <!-- Contenu de la modale -->
      <h2 class="mb-4 text-lg font-bold">Modifier les informations</h2>
      <img class="max-w-xs rounded-lg object-cover object-center "  x-bind:src="photo" alt="product" />
      <div class="my-6 flex items-center justify-between px-4">
        <p class="font-bold text-gray-500">Prix</p>
        <p class="rounded-full bg-blue-500 px-2 py-0.5 text-xs font-semibold text-white" x-text="prix"></p>fcfa
      </div>
      <div class="my-4 flex items-center justify-between px-4">
        <p class="text-sm font-semibold text-gray-500">Code</p>
        <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600" x-text="code"> </p>
      </div>
      <div class="my-4 flex items-center justify-between px-4">
        <p class="text-sm font-semibold text-gray-500">Article</p>
        <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600" x-text="nom"> </p>
      </div>
      <div class="my-4 flex items-center justify-between px-4">
        <p class="text-sm font-semibold text-gray-500">Quantité</p>
        <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600"x-text="quantite"> </p>
      </div>

          <div class="mt-2">
              <label for="client" class="block text-sm font-medium leading-6 text-gray-900">statut</label>
              <select  id="client" name="client" x-model="statut_id"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                  <option>Selectionner le statut</option>
                @foreach ($lesStatuts as $statut)
                <option  value="{{ $statut->id }}" >{{ $statut->libelle }}</option>
                @endforeach


              </select>
          </div>

        <div class="text-right mt-2">
          <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded" @click="EnregisterData()">Enregistrer</button>
          <button class="px-4 py-2 ml-2 text-gray-700 bg-gray-300 rounded" x-on:click="checkClose()">Annuler</button>
        </div>

    </div>
  </div>


    </div>
</div>
