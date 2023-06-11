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
                <div class="flex-row">
                <div class=" max-w-sm p-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-700 dark:border-gray-700">
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Estadísticas:</h2>
                <ul class="font-normal text-gray-700 dark:text-gray-400">
                    <li>Total de ejercicios: {{ $routine->exercises->count() }}</li>
                    <li>Total de series: {{ $routine->exercises->sum('pivot.sets') }}</li>
                    <li>Total de repeticiones: {{ $routine->exercises->sum('pivot.reps') }}</li>
                </ul>
                </div>
                {{--Aquí van las estadísticas del usuario--}}
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
                    <ul class="">
                        @foreach ($routine->exercises as $exercise)
                            <li class="">
                                <div class="flex flex-row items-center rounded-lg border border-gray-200 bg-gray-100 shadow dark:border-gray-700 dark:bg-gray-700 md:max-w-4xl">
                                    <img class=" ml-4 flex-shrink-0 selection:pl-4 w-16 rounded-full object-cover md:w-32" src="{{ asset('images/exercises/' . $exercise->ImageSrc) }}" alt="{{ $exercise->name }}" />
                                    <div class="flex flex-col justify-between px-4 pb-5 pt-1 leading-normal">
                                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">fondos de codo</h5>
                                      <span class="right-0 top-0">{{ $exercise->pivot->Order }}º</span>
                                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $exercise->pivot->Description }}</p>
                                      <ul class="text-slate-900 dark:text-slate-300">
                                        <li><span class="inline-block w-24 font-bold">Sets:</span> <span class="inline-block rounded bg-blue-200 p-1 w-10 text-center font-semibold text-gray-800">{{ $exercise->pivot->sets }}</span></li>
                                        <li><span class="inline-block w-24 font-bold">Reps:</span> <span class="inline-block rounded bg-green-200 p-1 w-10 text-center font-semibold text-gray-800">{{ $exercise->pivot->reps }}</span></li>
                                        <li><span class="inline-block w-24 font-bold">RIR máx:</span> <span class="inline-block rounded bg-red-200 p-1 w-10 text-center font-semibold text-gray-800">{{ $exercise->pivot->rir }}</span></li>
                                      </ul>
                                    </div>
                                  </div>
                                  
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
        </div>
    </div>
</div>