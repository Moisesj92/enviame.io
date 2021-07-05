<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Nueva Compañia</h2>

                    <form method="POST" action="{{ route('companyweb.store') }}">
                        @csrf

                        <!-- Company Name -->
                        <div class="flex flex-row justify-around">
                            <div class="flex flex-col">
                                <x-label for="companyName" :value="__('Nombre')" />
                                <x-input id="companyName" class="block mt-1 w-full" type="text" name="name" required autofocus />
                            </div>

                            <div  class="flex flex-col">
                                <x-label for="campanyRut" :value="__('Rut')" />
                                <x-input id="campanyRut" class="block mt-1 w-full" type="text" name="rut" required autofocus />
                            </div>

                            <div class="flex items-end">
                                <x-button class="ml-3">
                                    {{ __('Crear') }}
                                </x-button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    @push('scripts')

    <script type="text/javascript">
        //Iniciar al cargar la pagina
        (() => {

            //Definicion
            //Eventos
            //Funciones
            //Ejecucion

        })();
    </script>

    @endpush

</x-app-layout>