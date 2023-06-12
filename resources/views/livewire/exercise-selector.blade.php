<div>
    <ul>
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar ejercicio..." />

    <ul>
        @foreach ($filteredExercises as $exercise)
            <li wire:click="$emit('exercise-selected', '{{ $exercise->id }}')">{{ $exercise->name }}</li>
        @endforeach
    </ul>
    </ul>

    @if ($selectedExercise)
        <div class="mt-4">
            <p>Exercise selected: {{ $selectedExercise->name }}</p>
            <button wire:click="resetSelection">Reset</button>
        </div>
    @endif
</div>