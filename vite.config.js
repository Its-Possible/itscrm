import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Scss
                'resources/css/app.css',
                'resources/css/auth.css',
                // JavaScript
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
