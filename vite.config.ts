import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue";
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    css: {
        postcss: './postcss.config.js',
    },
    resolve: {
        alias: {
            '@': '/resources/js',
            '@components': '/resources/js/Components',
            '@pages': '/resources/js/Pages',
        },
    },
});
