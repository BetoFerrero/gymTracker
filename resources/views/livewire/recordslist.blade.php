<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-4 text-2xl font-medium text-gray-900">
        <div></div>
    </h1>
<div class="flex justify-between">
    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"></label>
    
        <button  wire:model="selectedRoutine" id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button" >
            @if ($selectedRoutine && $selectedRoutine != "")
            {{ $selectedRoutine }}
        @else
            Rutina
        @endif
            <svg aria-hidden="true" :class="{ 'transform rotate-180': isOpen }" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                <li>
                    <button wire:click="searchByRoutine(null,null)" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600">Todas las rutinas</a>
                </li>
                @foreach ($userRoutines as $userRoutine)
                    <li>
                        <button type="button" wire:click="searchByRoutine('{{ $userRoutine->id }}','{{$userRoutine->name}}')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $userRoutine->name }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    
        <div class="relative w-full">
            <input wire:model.debounce.300ms="search" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Búsqueda" required>

        </div>
</div>

    <div class="mt-3">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <a wire:click="sortByColumn('Date')" class="cursor-pointer">
                                Fecha
                                @if ($sortBy === 'Date')
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 12.707a1 1 0 010-1.414L10 7.586l4.293 4.293a1 1 0 11-1.414 1.414L10 10.414l-3.293 3.293a1 1 0 01-1.414-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                @endif
                            </a>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <a wire:click="sortByColumn('name','routines')" class="cursor-pointer">
                                Rutina
                                @if ($sortBy === 'name' && $relation === 'routine')
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 12.707a1 1 0 010-1.414L10 7.586l4.293 4.293a1 1 0 11-1.414 1.414L10 10.414l-3.293 3.293a1 1 0 01-1.414-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                @endif
                            </a>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <a wire:click="sortByColumn('totalVolume')" class="cursor-pointer">
                                Volumen
                                @if ($sortBy === 'totalVolume')
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 12.707a1 1 0 010-1.414L10 7.586l4.293 4.293a1 1 0 11-1.414 1.414L10 10.414l-3.293 3.293a1 1 0 01-1.414-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                @endif
                            </a>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <a wire:click="sortByColumn('Comment')" class="cursor-pointer">
                                Comentario
                                @if ($sortBy === 'Comment')
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 12.707a1 1 0 010-1.414L10 7.586l4.293 4.293a1 1 0 11-1.414 1.414L10 10.414l-3.293 3.293a1 1 0 01-1.414-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                @endif
                            </a>
                        </div>
                    </th>
                    <th class="w-1/12 px-2 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ( $records as $record )
                <tr>
                    <td>
                        {{$record->getFormattedDate()}}
                    </td>
                    <td>
                        {{$record->routine->name}}
                    </td>
                    <td>
                        {{$record->totalVolume()}} kg
                    </td>
                    <td>
                        <div class="comment-truncate" title="{{ $record->Comment }}">
                            {{ \Illuminate\Support\Str::limit($record->Comment, 30) }}
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="pt-8">
                        <div class="bg-gray-200 p-4 rounded">
                            Aún no tienes ningún registro,  
                            <a href="{{route('routines')}}"><button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">¡A entrenar!</button></a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$records->links()}}
    </div>

</div>