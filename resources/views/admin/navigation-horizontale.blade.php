<div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
    <div class="flex items-center">
        <div class="flex items-center"> <!-- Mostrado en todos los dispositivos -->
            <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-28 h-18 mr-2">
            <h2 class="font-bold text-xl text-blue-500">Nombre de la Aplicación</h2>
        </div>
        <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
            <button id="menuBtn">
                <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
            </button>
        </div>
    </div>

    <!-- Ícono de Notificación y Perfil -->
    @if (Session::has('success'))
    <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">Felicitation!</span> {{ session::get('success') }}
        </div>
    </div>
    @endif



    <div class="space-x-5">
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>{{ Auth::guard('admin')->user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('admin.logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Deconnexion') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

    </div>

</div>
