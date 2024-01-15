import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                // Scss
                'resources/scss/app.scss',
                'resources/scss/auth.scss',
                // JavaScript
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
