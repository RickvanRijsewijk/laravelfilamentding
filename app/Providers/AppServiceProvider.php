<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Article;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('dropdown-menu', \App\Livewire\DropdownMenu::class);

        View::composer('components.mainheader', function ($view) {
            $articles = Article::with('category')
                ->whereNotNull('published_at')
                ->get()
                ->groupBy(function($article) {
                    return $article->category ? $article->category->name : 'Uncategorized';
                });
                
            $view->with('articles', $articles);
        });

        FilamentAsset::register([
            Css::make('custom-stylesheet', __DIR__ . '/../../resources/css/custom-filament.css'),
        ]);
    }
}
