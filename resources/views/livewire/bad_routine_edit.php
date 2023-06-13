<div x-data="{ showModal: false }">
    <button @click="showModal = true" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        Editar
    </button>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none backdrop-blur bg-gray-800 bg-opacity-50">
        <div class="relative w-auto max-w-3xl mx-auto my-6">
            <!-- Contenido del modal -->
            <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 w-full h-full flex items-center justify-center">
                <div class="relative w-full max-w-2xl mx-auto p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <form wire:submit.prevent="saveRoutine">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Rutina : <input type="text" wire:model="routine.Name" id="routineName">
                                </h3>
                                <button type="button" @click="showModal = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <!-- FORMULARIO -->
                                <div>
                                    <div>
                                        <label for="routineDescription">Descripción:</label>
                                        <textarea wire:model="routineDescription" id="routineDescription"></textarea>
                                    </div>
                        
                                    <div>
                                        <h3>Ejercicios:</h3>
                        
                                        @foreach ($exercises as $index => $exercise)
                                            <div>
                                                <label>Ejercicio:</label>
                                                <select wire:model="exercises.{{ $index }}.exercise">
                                                    <!-- Aquí puedes cargar los ejercicios desde tu modelo Exercise -->
                                                    <option value="ejercicio1">Ejercicio 1</option>
                                                    <option value="ejercicio2">Ejercicio 2</option>
                                                    <!-- Agrega más opciones según tus necesidades -->
                                                </select>
                        
                                                <label>Sets:</label>
                                                <input type="text" wire:model="exercises.{{ $index }}.sets">
                        
                                                <label>Reps:</label>
                                                <input type="text" wire:model="exercises.{{ $index }}.reps">
                        
                                                <label>RIR:</label>
                                                <input type="text" wire:model="exercises.{{ $index }}.rir">
                        
                                                <button type="button" wire:click="removeExercise({{ $index }})">🗑</button>
                                            </div>
                                        @endforeach
                        
                                        <button type="button" wire:click="addExercise">Agregar ejercicio</button>
                                    </div>
                                </div>
                        
                                <div>
                                    <h3>Ejercicios de la rutina:</h3>
                                    @foreach ($routineExercises as $routineExercise)
                                        <div>
                                            <p>Ejercicio: {{ $routineExercise->exercise->Name }}</p>
                                            <label>Sets:</label>
                                            <input type="text" wire:model="routineExercises.{{ $routineExercise->id }}.sets">
                        
                                            <label>Reps:</label>
                                            <input type="text" wire:model="routineExercises.{{ $routineExercise->id }}.reps">
                        
                                            <label>RIR:</label>
                                            <input type="text" wire:model="routineExercises.{{ $routineExercise->id }}.rir">
                                        </div>
                                    @endforeach
                                </div>
                        
                                <button type="submit">Guardar</button>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button @click="showModal = false" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                <button @click="showModal = false" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Exercise Search Dropdown Component -->
    <livewire:exercise-search-dropdown wire:model="selectedExercise" />

    @if ($selectedExercise)
        <p>Exercise ID: {{ $selectedExercise }}</p>
        <button wire:click="resetSelection">Reset</button>
    @endif

    <script>
        // JavaScript para abrir y cerrar el modal
        function closeModal() {
            const modal = document.getElementById('staticModal');
            modal.classList.add('hidden');
        }

        function openModal() {
            const modal = document.getElementById('staticModal');
            modal.classList.remove('hidden');
        }

        Livewire.on('showModal', () => {
            openModal();
        });

        Livewire.on('closeModal', () => {
            closeModal();
        });
    </script>
</div>
