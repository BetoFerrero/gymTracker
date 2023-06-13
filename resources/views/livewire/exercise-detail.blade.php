
<div>
    <div class="my-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $exercise->name }}</h2>
    </div>

    @if ($editing)
    <form wire:submit.prevent="save">
        <div class="dark:bg-gray-800">
            <label for="name" class="dark:text-white">Name</label>
            <input type="text" wire:model="exercise.Name" name="name" class="dark:bg-gray-700">
            @error('Name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="dark:bg-gray-800">
            <label for="bodyPart" class="dark:text-white">Body Part</label>
            <input type="text" wire:model="exercise.bodyPart" name="bodyPart" class="dark:bg-gray-700">
            @error('bodyPart') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="dark:bg-gray-800">
            <label for="description" class="dark:text-white">Description</label>
            <textarea wire:model="exercise.Description" name="description" class="dark:bg-gray-700"></textarea>
            @error('Description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="dark:bg-gray-800">
            <label for="equipment" class="dark:text-white">Equipment</label>
            <input type="text" wire:model="exercise.equipment" name="equipment" class="dark:bg-gray-700">
            @error('equipment') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="dark:bg-gray-800">
            <label for="target" class="dark:text-white">Target</label>
            <input type="text" wire:model="exercise.target" name="target" class="dark:bg-gray-700">
            @error('target') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="dark:bg-gray-800">
            <label for="tracking" class="dark:text-white">Tracking</label>
            <input type="text" wire:model="exercise.tracking" name="tracking" class="dark:bg-gray-700">
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
                <div class="p-4 border border-gray-300 rounded-lg shadow bg-white dark:bg-gray-900 ">
                    <div class="flex items-center ">
                        <div class="mr-4">
                          <img src="{{ asset('images/exercises/' . $exercise->ImageSrc) }}" alt="Imagen de {{ $exercise->Name }}" class="h-21 object-cover rounded-lg">
                        </div>
                        <div>
                    <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h1 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ $exercise->Name }}</h2>
                        <div class="mt-12">
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Descripción</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $exercise->Description }}</dd>
                        </dl>
                        <dl class="flex items-center space-x-8">
                            <div class="flex-grow ">
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Parte del cuerpo</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400 pr-2">{{ $exercise->bodyPart }}</dd>
                            </div>
                            <div>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Equipamiento</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $exercise->equipment }}</dd>
                            </div>
                            <div>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Medición</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $exercise->Tracking }}</dd>
                            </div>
                        </dl>
                        @if ($isAdmin)
                        <div class="flex items-center space-x-4">
                            <button wire:click="edit" type="button" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                Edit
                            </button>   
                            <button type="button" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete
                            </button>
                            @endif 
                        </div>
                    </div>
                    </div>
                </section>
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
    @endif
</div>
