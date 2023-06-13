
<div>
    <div class="my-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $exercise->name }}</h2>
    </div>

    @if ($editing)
        <form wire:submit.prevent="save">
            <div>
                <label for="name">Name</label>
                <input type="text" wire:model="exercise.Name" name="name">
                @error('Name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="bodyPart">Body Part</label>
                <input type="text" wire:model="exercise.bodyPart" name="bodyPart">
                @error('bodyPart') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea wire:model="exercise.Description" name="description"></textarea>
                @error('Description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="equipment">Equipment</label>
                <input type="text" wire:model="exercise.equipment"  name="equipment">
                @error('equipment') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="target">Target</label>
                <input type="text" wire:model="exercise.target" name="target">
                @error('target') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="tracking">Tracking</label>
                <input type="text" wire:model="exercise.tracking" name="tracking">
                @error('tracking') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit">Save</button>
            </div>
        </form>
    @else
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4 border border-gray-300 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="mr-4">
                          <img src="ruta-a-tu-imagen.jpg" alt="Imagen de ejercicio" class="image-container">
                        </div>
                        <div>
                    <h3 class="text-lg font-semibold">{{ $exercise->Name }}</h3>
                    <p class="text-gray-600">{{ $exercise->bodyPart }}</p>
                    <p class="mt-2 text-sm text-gray-800">{{ $exercise->Description }}</p>
                    <p class="mt-2 text-sm text-gray-800">{{ $exercise->equipment }}</p>
                    <p class="mt-2 text-sm text-gray-800">{{ $exercise->target }}</p>
                    <p class="mt-2 text-sm text-gray-800">
                        Tracking: 
                        @if ($exercise->tracking === 'sets')
                            Sets
                        @elseif ($exercise->tracking === 'sets,reps')
                            Sets y Reps
                        @elseif ($exercise->tracking === 'tiempo')
                            Tiempo
                        @else
                        <span class="text-red-600">
                            {{$exercise->Tracking}}
                        </span>
                        @endif
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <!--
        <div>
            <p>Name: {{ $exercise->Name }}</p>
            <p>Body Part: {{ $exercise->bodyPart }}</p>
            <p>Description: {{ $exercise->description }}</p>
            <p>Equipment: {{ $exercise->equipment }}</p>
            <p>Target: {{ $exercise->target }}</p>
            <p>Tracking: {{ $exercise->Tracking }}</p>
        </div>
    -->
        @if ($isAdmin)
            <button wire:click="edit">Edit</button>
        @endif
    @endif
</div>
