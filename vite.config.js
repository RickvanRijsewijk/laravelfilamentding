import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [...refreshPaths, "app/Livewire/**"],
            content: [
                './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
            ],
        }),
        tailwindcss(),
    ],
});
