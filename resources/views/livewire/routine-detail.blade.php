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
                        <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Editar 
                        </button>
                    
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
                                    <img class="h-8 w-8 rounded-full" src="{{ asset('images/exercises/' . $exercise->ImageSrc) }}" alt="{{ $exercise->name }}">
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-sm font-semibold text-gray-900">{{ $exercise->name }}</h2>
                                    <p class="text-xs text-gray-500">{{ $exercise->description }}</p>
                                </div>
                                <div class="ml-auto">
                                    <div class="text-sm font-medium text-gray-900">{{ $exercise->pivot->Order }}</div>
                                    <div class="text-sm text-gray-500">{{ $exercise->pivot->Sets }}</div>
                                    <div class="text-sm text-gray-500">{{ $exercise->pivot->Reps }}</div>
                                    <div class="text-sm text-gray-500">{{ $exercise->pivot->rir }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
        </div>
    </div>
</div>