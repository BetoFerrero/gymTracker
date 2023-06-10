<div x-data="{ hasRoutines: @json($routines->isNotEmpty()), creatingRoutine: false, newRoutineName: '' }" x-init="
    Livewire.on('refreshComponent', () => {
        creatingRoutine = false;
    })
">
    <ul x-show="hasRoutines">
        @foreach ($routines as $routine)
            <li class="bg-gray-100 p-4 mb-4 rounded shadow">
                <a href="{{route('routine.show', ['routine' => $routine->id]) }}"><h3 class="text-xl font-bold">{{ $routine->name }}</h3></a>
                <p class="text-gray-500">{{ $routine->description }}</p>
                <?php// TODO: ?>
            </li>
        @endforeach
    </ul>

    <div x-show="!hasRoutines && !creatingRoutine">
        <p>Crea una rutina para comenzar!</p>
        <button @click="creatingRoutine = true">Crear rutina</button>
    </div>

    <div x-show="creatingRoutine">
        <form wire:submit.prevent="createRoutine">
        <input type="text" placeholder="Nombre de la rutina" wire:model="newRoutineName">
        <button type="submit">Crear rutina</button>
        </form>
    </div>

    <div x-show="hasRoutines && !creatingRoutine">
        <button @click="creatingRoutine = true">Crear nueva rutina</button>
    </div>

    <div class="mt-4">
        
    </div>
</div>