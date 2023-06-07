<div x-data="{ hasRoutines: {{ $routines->isNotEmpty() ? 'true' : 'false' }} }">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <ul  x-show="hasRoutines">
        @foreach ($routines as $routine)
            <li class="bg-gray-100 p-4 mb-4 rounded shadow">
                <h3 class="text-xl font-bold">{{ $routine->name }}</h3>
                <p class="text-gray-500">{{ $routine->description }}</p>
                <!-- Otros datos de la rutina -->
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $routines->links() }}
    </div>

    <p x-show="!hasRoutines">Crea una rutina para comenzar!</p>
</div>
