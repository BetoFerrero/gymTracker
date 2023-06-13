<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg dark:bg-gray-400">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="mr-6">
                            <img class="h-20 w-20 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <div>
                            <h2 class="text-2xl font-semibold dark:text-white">Hola! {{ Auth::user()->name }}</h2>
                            <p class="text-gray-600 dark:text-white">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-gray-100 p-4 rounded-lg dark:bg-gray-800">
                            <h3 class="text-lg font-semibold dark:text-white">Últimos 7 días</h3>
                            <livewire:record-chart />
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg dark:bg-gray-800">
                            <h3 class="text-lg font-semibold dark:text-white">Mis estadísticas</h3>
                            <p class="text-gray-600 dark:text-white">(aún no tienes estadísticas)</p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center dark:bg-gray-800">
                            <h3 class="text-lg font-semibold dark:text-white">Aún no tienes ninguna rutina!</h3>
                            <a href="/routines" class="mt-4 inline-flex items-centerfocus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Crea una rutina
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
