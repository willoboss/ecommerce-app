<div x-data="{


}">
    <!-- Create By Joker Banny -->
<!-- Create By Joker Banny -->
<div class=" max-h-screen mt-8 bg-gray-100">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mx-auto px-5">
    @foreach ($monpanier as $commande)


    <div class=" max-w-md cursor-pointer rounded-lg bg-white p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
      <img class="w-full rounded-lg object-cover object-center "  src="{{  $commande['lignecommandes'][0]['article']['photo'] }}" alt="product" />

      <div>
        <div class="my-6 flex items-center justify-between px-4">
          <p class="font-bold text-gray-500">{{  $commande['lignecommandes'][0]['article']['nom'] }}</p>
          <p class="rounded-full bg-blue-500 px-2 py-0.5 text-xs font-semibold text-white">{{  $commande['lignecommandes'][0]['article']['prix'] }} cfa</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Quantité</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">{{  $commande['lignecommandes'][0]['quantite'] }} </p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Prix commande</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">{{  $commande['lignecommandes'][0]['prix_commande'] }} cfa</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Code</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">{{  $commande['code'] }}</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Statut</p>
          <span x-bind:class="{
            'bg-green-500': '{{ $commande['lignecommandes'][0]['statut']['libelle'] }}' === 'Livrée',
            'bg-red-500': '{{ $commande['lignecommandes'][0]['statut']['libelle'] }}' === 'annulée',
            'bg-blue-500': '{{ $commande['lignecommandes'][0]['statut']['libelle'] }}' === 'en cours de traitement',
            'bg-orange-500': '{{ $commande['lignecommandes'][0]['statut']['libelle'] }}' === 'en expédition'
        }"

            class="relative rounded-full inline-block px-3 py-1 font-semibold leading-tight text-white"
        >
            <span aria-hidden="true" class="absolute inset-0 rounded-full opacity-50">
            </span>
            <span class="relative">
                {{ $commande['lignecommandes'][0]['statut']['libelle'] }}
            </span>
        </span>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                Suivre
            </button>
          </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
