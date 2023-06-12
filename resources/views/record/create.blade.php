<x-app-layout>
@livewire('registro-rutina', ['routine' => $routine])
<div>
    <h2>Registro de Rutina: {{ $routine->nombre }}</h2>
    <form wire:submit.prevent="guardarRegistro">
        @foreach($routine->exercises as $exercise)
            <div>
                <label>{{ $exercise->nombre }}</label>
                <input type="number" wire:model="sets.{{ $exercise->id }}" placeholder="Número de sets">
            </div>
        @endforeach
        <button type="submit">Guardar</button>
    </form>
</div>
</x-app-layout>