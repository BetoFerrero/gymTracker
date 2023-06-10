<div>
    <h1>{{ $routine->name }}</h1>
    <p>{{ $routine->description }}</p>

    <h2>Exercise List</h2>
    <ul>
        @foreach ($routineTables as $routineTable)
            <li>
                {{ $routineTable->exercise->name }}
                <!-- Mostrar información adicional del ejercicio -->
            </li>
        @endforeach
    </ul>

    <h2>Create Routine Table</h2>
    <div>
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search Exercise" />
        <div>
            <ul>
                @foreach ($exercises as $exercise)
                    <li>{{ $exercise->name }}</li>
                    <!-- Mostrar información adicional del ejercicio -->
                @endforeach
            </ul>
            {{ $exercises->links() }}
        </div>
        <select wire:model="selectedExercise">
            <option value="">Select Exercise</option>
            @foreach ($exercises as $exercise)
                <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
            @endforeach
        </select>
        <button wire:click="createRoutineTable">Create Routine Table</button>
    </div>
</div>