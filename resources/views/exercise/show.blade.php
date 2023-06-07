<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($exercise->Name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4 border border-gray-300 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">{{ $exercise->name }}</h3>
                    <p class="text-gray-600">{{ $exercise->bodyPart }}</p>
                    <p class="mt-2 text-sm text-gray-800">{{ $exercise->description }}</p>
                    <p class="mt-2 text-sm text-gray-800">{{ $exercise->equipment }}</p>
                    <p class="mt-2 text-sm text-gray-800">{{ $exercise->target }}</p>
                    <p class="mt-2 text-sm text-gray-800">
                        Tracking: 
                        @if ($exercise->tracking === 'sets')
                            Sets
                        @elseif ($exercise->tracking === 'sets,reps')
                            Sets and Reps
                        @elseif ($exercise->tracking === 'tiempo')
                            Time
                        @else
                            Sets
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>