<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Models\Subscription;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class ArticleOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $stats = [];

        $totalArticles = Article::count();
        $articlesToday = Article::whereDate('created_at', Carbon::today())->count();
        $articlesRemovedToday = Article::onlyTrashed()->whereDate('deleted_at', Carbon::today())->count();
        $unpublishedArticles = Article::whereNull('published_at')->count();
        $publishedArticles = Article::whereNotNull('published_at')->count();
        $averageArticleViews = round(Article::avg('views'), 1);
        $totalSubscriptions = Subscription::count();

        $previousAverageViews = Cache::get('previous_average_views', $averageArticleViews);

        if ($averageArticleViews > $previousAverageViews) {
            $color = 'success';
            $icon = 'heroicon-m-arrow-trending-up';
        } elseif ($averageArticleViews < $previousAverageViews) {
            $color = 'danger';
            $icon = 'heroicon-m-arrow-trending-down';
        } else {
            $color = 'info';
            $icon = 'heroicon-s-eye';
        }

        Cache::put('previous_average_views', $averageArticleViews);

        // Determine the color and icon for total articles
        if ($articlesToday > 0) {
            $totalArticlesColor = 'success';
            $totalArticlesIcon = 'heroicon-m-arrow-trending-up';
        } elseif ($articlesRemovedToday > 0) {
            $totalArticlesColor = 'danger';
            $totalArticlesIcon = 'heroicon-m-arrow-trending-down';
        } else {
            $totalArticlesColor = 'info';
            $totalArticlesIcon = 'heroicon-s-eye';
        }

        $stats[] = Stat::make('Total Articles', $totalArticles)
            ->description("{$articlesToday} added today")
            ->descriptionIcon($totalArticlesIcon)
            ->color($totalArticlesColor);

        $stats[] = Stat::make('Unpublished Articles', $unpublishedArticles)
            ->description("Unpublished articles count")
            ->descriptionIcon('heroicon-s-eye')
            ->color('info');

        $stats[] = Stat::make('Published Articles', $publishedArticles)
            ->description("Published articles count")
            ->descriptionIcon('heroicon-s-eye')
            ->color('info');

        if ($user->hasRole('admin')) {
            $stats[] = Stat::make('Total Users', User::count())
                ->description("Total user accounts")
                ->descriptionIcon('heroicon-s-user')
                ->color('info');
        }

        $stats[] = Stat::make('Average Article Views', $averageArticleViews)
            ->description("Average article views")
            ->descriptionIcon($icon)
            ->color($color);

        $stats[] = Stat::make('Total Subscriptions', $totalSubscriptions)
            ->description("Total subscriptions count")
            ->descriptionIcon('heroicon-s-envelope')
            ->color('info');
        return $stats;
    }
}
