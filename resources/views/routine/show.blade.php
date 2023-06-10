<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis rutinas
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>{{ $routine->name }}</h1>
                <p>{{ $routine->description }}</p>
                
                <h2>Ejercicios:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Orden</th>
                            <th>Sets</th>
                            <th>Reps</th>
                            <th>RIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routine->exercises as $exercise)
                        <tr>
                            <td>{{ $exercise->name }}</td>
                            <td>{{ $exercise->description }}</td>
                            <td>{{ $exercise->pivot->Order }}</td>
                            <td>{{ $exercise->pivot->Sets }}</td>
                            <td>{{ $exercise->pivot->Reps }}</td>
                            <td>{{ $exercise->pivot->rir }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>