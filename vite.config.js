// vite.config.js
import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'public/build', // Output directory
    manifest: true, // Generate manifest.json file
  },
});