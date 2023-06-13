import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/WelcomeLocomotive.js',
                'resources/css/Welcome.css'
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
                'app/resources/views/**'
            ],
        }),
    ],
});
