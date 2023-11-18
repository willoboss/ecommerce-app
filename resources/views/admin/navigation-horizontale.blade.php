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
        <button>
            <i class="font-medium text-green-500 text-lg"> {{ Auth::guard('admin')->user()->name }}</i>
        </button>
        <button>
            <i class="fas fa-bell text-gray-500 text-lg"></i>
        </button>
        <!-- Botón de Perfil -->
        <button>
            <i class="fas fa-user text-gray-500 text-lg"></i>
        </button>
    </div>
</div>
