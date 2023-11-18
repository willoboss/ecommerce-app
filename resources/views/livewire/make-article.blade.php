<div x-data="{
    libelle:@entangle('libelle').defer,
    prix:@entangle('prix').defer,
    description:@entangle('description').defer,
    stock:@entangle('stock').defer,
    photoUrl:@entangle('photoUrl').defer,
    photo:@entangle('photo').defer,
    categorieId:@entangle('categorieId').defer,
    imageSrc:'',


    sendArticle(){
        console.log('hello world!')
        this.EnregisterData()
    },


    EnregisterData: async function(){
                await @this.addArticle().then(value => {
                    data = JSON.parse(value);
                });
            }

}">

    <div class=" mx-auto text-center ">
        <div class="py-16 px-7 rounded-md bg-white">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Ajouter Article</h2>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-6">

                  <input type="text" id="fname" x-model="libelle" name="fname" placeholder="Libelle *" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 ">
                  <input type="number" id="fname" x-model="prix" name="fname" placeholder="Prix *" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                  <div class="md:col-span-2">
                    <input type="number" id="email" x-model="stock" name="email" placeholder="Stock *" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                  </div>
                  <div class="md:col-span-2">
                    <label for="subject" class="float-left block  font-normal text-gray-400 text-lg">Categorie:</label>
                    <select id="subject" x-model="categorieId" name="subject" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                      <option value="" disabled selected>Sélectionnez la categorie</option>
                      @foreach ($lesCategories as $cate)
                      <option value="{{ $cate->id }}">{{ $cate->libelle }}</option>
                      @endforeach

                    </select>
                  </div>

                  <div x-show="imageSrc" class="mt-4">
                    <img x-bind:src="imageSrc" alt="Photo" style="width: 400px; height: 400px;">
                </div>


                  <div class="w-80">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900" for="small_size">Choisir une photo</label>
                    <input type="file" wire:model="photo" @change="imageSrc = URL.createObjectURL($event.target.files[0])" name="photo" class="block w-full mb-5 text-xs
                     text-gray-400 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gra
                     y-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    @error('photo') <span class="error text-color-danger">{{ $message }}</span> @enderror
                </div>

                  <div class="md:col-span-2">
                    <textarea name="message" x-model="description" rows="5" cols="" placeholder="Description *" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"></textarea>
                  </div>
                  <!-- <div class="md:col-span-2">
                    <input type="checkbox" name="" id="" class="mr-2 sm:m-1">
                    <label for="" class="text-sm col-span-2">
                      Autoriser OC à vous envoyer des lettres d'information par E-mail.
                    </label>
                  </div> -->
                  <div class="md:col-span-2">
                    <button class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300" x-on:click="sendArticle()">Valider</button>
                  </div>
                </div><!-- Grid End -->

        </div>

        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Les articles</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Photo</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Libelle</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lesArticles as $article)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light"><img src="{{ asset($article->photo) }}" alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                        <td class="py-2 px-4 border-b border-grey-light">{{ $article->nom }}</td>
                        <td class="py-2 px-4 border-b border-grey-light">{{ $article->stock }}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
            <div class="text-right mt-4">
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                    Ver más
                </button>
            </div>
        </div>
    </div>
</div>
