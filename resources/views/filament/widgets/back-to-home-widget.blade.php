<x-filament::widget>
    <style>
        .btn-primary {
            background-color: #3490dc;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #2779bd;
        }
    </style>
    <x-filament::card>
        <div class="flex flex-col items-center justify-center p-4 space-y-4">
            <h2 class="text-lg font-semibold text-white-700">Welcome to the Admin Panel</h2>
            <p class="text-sm text-white-500">Click the button below to return to the home page.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">
                Back to Home
            </a>
        </div>
    </x-filament::card>
</x-filament::widget>