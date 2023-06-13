<div x-data="{ hasRoutines: @json($routines->isNotEmpty()), creatingRoutine: false, newRoutineName: '' }" x-init="
    Livewire.on('refreshComponent', () => {
        creatingRoutine = false;
    })
">
    <ul x-show="hasRoutines">
        @foreach ($routines as $routine)
            <li class="bg-gray-100 p-4 mb-4 rounded shadow dark:bg-gray-700">
                <a href="{{route('routine.show', ['routine' => $routine->id]) }}"><h3 class="text-xl font-bold mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $routine->name }}</h3></a>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $routine->description }}</p>
                <?php// TODO: ?>
            </li>
        @endforeach
    </ul>

    <div x-show="!hasRoutines && !creatingRoutine">
        <p>Crea una rutina para comenzar!</p>
        <button @click="creatingRoutine = true">Crear rutina</button>
    </div>

    <div x-show="creatingRoutine" >
        <form wire:submit.prevent="createRoutine">
        <input type="text" placeholder="Nombre de la rutina" wire:model="newRoutineName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <button type="submit" class="inline-block focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Crear rutina</button>
        </form>
    </div>

    <div x-show="hasRoutines && !creatingRoutine" class="flex">

        <button @click="creatingRoutine = true" class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Crear nueva rutina</button>
    </div>

    <div class="mt-4">
        
    </div>
</div>