<div>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="sm:px-2">
                <h1 class="text-4xl font-bold dark:text-white pb-8 ">{{ $routine->name }}</h1>
                @if($routine->description)
                <p class="pb-4 font-normal text-gray-700 dark:text-gray-400">{{ $routine->description }}</p>
                @else
                <p class="pb-4 font-normal text-gray-700 dark:text-gray-400">(Sin descripción)</p>
                @endif
                <div class="block max-w-sm p-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-700 dark:border-gray-700">
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Estadísticas:</h2>
                <ul class="font-normal text-gray-700 dark:text-gray-400">
                    <li>Total de ejercicios: {{ $routine->exercises->count() }}</li>
                    <li>Total de series: {{ $routine->exercises->sum('pivot.sets') }}</li>
                    <li>Total de repeticiones: {{ $routine->exercises->sum('pivot.reps') }}</li>
                </ul>
                </div>
            </div>
            <div class="py-4">
            @if ($routine->user_id == auth()->id() || auth()->user()->isAdmin())
                    <!-- Es el owner -->
                    
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Registrar entreno +
                        </button>
                        <livewire:routine-edit :routine="$routine" />

                    
                @else
                    <!-- Invitado -->
                    <div>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Guardar en mis rutinas
                        </button>
                    </div>
                @endif
            </div>
                <h2 class="dark:text-gray-700 text2xl">Ejercicios:</h2>
                <hr class="h-px mb-8 mt-2 bg-gray-200 border-0 dark:bg-gray-700">
                <div>
                @if ($routine->exercises->isEmpty())
                    <p class="text-gray-700 dark:text-gray-600">Rutina sin ejercicios</p>
                @else
                    <ul class="border border-gray-200 divide-y divide-gray-200">
                        @foreach ($routine->exercises as $exercise)
                            <li class="py-4 px-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="sm:h-20 sm:w-20 lg:w-1/5 lg:h-1/5  rounded-full" src="{{ asset('images/exercises/' . $exercise->ImageSrc) }}" alt="{{ $exercise->name }}">
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white"> {{ $exercise->Name }}</h2>
                                    <span class="ml-auto">
                                        <svg fill="#666" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 416.979 416.979" xml:space="preserve"><g><path d="M356.004,61.156c-81.37-81.47-213.377-81.551-294.848-0.182c-81.47,81.371-81.552,213.379-0.181,294.85c81.369,81.47,213.378,81.551,294.849,0.181C437.293,274.636,437.375,142.626,356.004,61.156z M237.6,340.786c0,3.217-2.607,5.822-5.822,5.822h-46.576c-3.215,0-5.822-2.605-5.822-5.822V167.885c0-3.217,2.607-5.822,5.822-5.822h46.576c3.215,0,5.822,2.604,5.822,5.822V340.786z M208.49,137.901c-18.618,0-33.766-15.146-33.766-33.765c0-18.617,15.147-33.766,33.766-33.766c18.619,0,33.766,15.148,33.766,33.766C242.256,122.755,227.107,137.901,208.49,137.901z"/></g>
                                   </svg></span>
                                    <p class="text-xs text-gray-500">{{ $exercise->pivot->Description }}</p>
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $exercise->pivot->Order }}º</div>
                                    <div class="text-sm text-gray-500">Sets: {{ $exercise->pivot->sets }}</div>
                                    <div class="text-sm text-gray-500">Reps: {{ $exercise->pivot->reps }}</div>
                                    <div class="text-sm text-gray-500">Rir: {{ $exercise->pivot->rir }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
        </div>
    </div>
</div>