import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";

/* if you're using React */
// import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    /* react(), // if you're using React */
    symfonyPlugin(),
  ],
  server: {
    host: "0.0.0.0",
    port: 3000,
    hmr: {
      host: "localhost",
      port: 3000,
    },
    watch: {
      usePolling: true,
    },
  },
  build: {
    rollupOptions: {
      input: {
        app: "./assets/app.js",
      },
    },
  },
});
