import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Las vistas piden estos ficheros con Vite::asset(): tienen que estar en el
            // manifiesto del build. Las imágenes son ficheros normales de public/images.
            input: [
                'resources/css/app.css',
                'resources/css/animate.css',
                'resources/css/tailwind-2.css',
                'resources/css/tailwind.css',
                'resources/js/app.js',
                'resources/js/main.js',
                'resources/js/wow.min.js',
            ],
            refresh: true,
        }),
    ],
});
