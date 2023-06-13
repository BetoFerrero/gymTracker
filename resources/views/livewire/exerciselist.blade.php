<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-4 text-2xl font-medium text-gray-900">
        <div>Ejercicios</div>
    </h1>
<div class="flex justify-between">
    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
            @if ($selectedBodyPart)
            {{ $selectedBodyPart }}
        @else
            Parte del cuerpo
        @endif
             <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                @foreach ($this->getUniqueBodyParts() as $bodyPart)
            <li>
                <button type="button" wire:click="searchByBodyPart('{{ $bodyPart }}')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $bodyPart }}</button>
            </li>
            @endforeach
        </ul>
        </div>
        <div class="relative w-full">
            <input wire:model.debounce.300ms="search" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="" required>
            <button wire:loading.attr="disabled" type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
</div>

    <div class="mt-3">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Imagen</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nombre</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Parte del cuerpo</div>
                    </th>
                    @if (auth()->user()->isAdmin())
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ( $exercises as $exercise )
                    <tr>
                        
                        <td class="px-4 py-2 p" >
                            <!--<x-exercise-image url="{{ asset('images/exercises/' . $exercise->ImageSrc) }} "  alt="{{$exercise->Name}}" class="w-200 h-150" />-->
                            <img src=" {{ asset('images/exercises/' . $exercise->ImageSrc) }} "  alt="{{$exercise->Name}}" class="object-cover h-20 w-20"/>   

                        </td>
                        <td>
                        <a href="{{ route('exercise.show', ['exercise' => $exercise->id]) }}" class="text-blue-500 hover:underline">{{$exercise->Name}}</a>
                    </td>
                        <!--<td>{{$exercise->Name}}</td>-->
                        <td>{{$exercise->bodyPart}}</td>
                        
                        @if (auth()->user()->isAdmin())
                        <td class="w-1/12">
                            
                            <button data-modal-target="popup-{{$exercise->id}}" data-modal-toggle="popup-{{$exercise->id}}" class="blocktext-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 dark:text-gray-100" type="button">
                                Eliminar
                              </button>
                              
                              <div id="popup-{{$exercise->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-{{$exercise->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">cerrar</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Deseas eliminar el ejercicio {{$exercise->name}} ?</h3>
                                            <button wire:click="deleteExercise({{$exercise->id}})" data-modal-hide="popup-{{$exercise->id}}"  type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Si
                                            </button>
                                            <button data-modal-hide="popup-{{$exercise->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endif
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$exercises->links()}}
    </div>
</div>