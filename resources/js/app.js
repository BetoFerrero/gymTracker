import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// Vite resources
import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);
  
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
