<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ "$exercise->Name" }}
        </h2>
    </x-slot>
    <livewire:exercise-detail :exercise="$exercise" />
</x-app-layout>