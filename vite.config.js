import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: path.resolve(__dirname, 'resources'), // Point Vite to the resources directory
  build: {
    outDir: path.resolve(__dirname, 'public/build'), // Specify the output directory
    rollupOptions: {
        input: [
            'resources/css/app.css',
            'resources/js/app.js',
        ],
        refresh: true,

    },
  },
});
