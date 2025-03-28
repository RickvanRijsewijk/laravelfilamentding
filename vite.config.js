import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

// Define refreshPaths
const refreshPaths = [
    'resources/views/**/*.blade.php',
    'resources/js/**/*.js',
    'resources/css/**/*.css',
];

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"], // , 'resources/css/filament/admin/theme.css'
            refresh: [...refreshPaths, 'app/Filament/**',
                'app/Forms/Components/**',
                'app/Livewire/**',
                'app/Infolists/Components/**',
                'app/Providers/Filament/**',
                'app/Tables/Columns/**',
                'resources/routes/**',
                'routes/**',
                'resources/views/**',],
            content: [
                './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
            ],
        }),
        tailwindcss(),
    ],
});
