<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\SubscriptionResource;
use App\Filament\Resources\UserResource;
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
    protected ?string $heading = 'Analytics';
    protected static ?string $pollingInterval = '10s';

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
            $color = 'primary';
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
            $totalArticlesColor = 'primary';
            $totalArticlesIcon = 'heroicon-s-eye';
        }

        $stats[] = Stat::make('Total Articles', $totalArticles)
            ->description("{$articlesToday} added today")
            ->descriptionIcon($totalArticlesIcon)
            ->url(ArticleResource::getUrl('index'))
            ->color($totalArticlesColor)
            ->extraAttributes(['class' => 'custom-stat-widget']);

        $stats[] = Stat::make('Unpublished Articles', $unpublishedArticles)
            ->description("Unpublished articles count")
            ->url(ArticleResource::getUrl('index', ['tableFilters[published][value]' => 'false']))
            ->descriptionIcon('heroicon-s-eye')
            ->color('primary')
            ->extraAttributes(['class' => 'custom-stat-widget']);

        $stats[] = Stat::make('Published Articles', $publishedArticles)
            ->url(ArticleResource::getUrl('index', ['tableFilters[published][value]' => 'true']))
            ->description("Published articles count")
            ->descriptionIcon('heroicon-s-eye')
            ->color('primary')
            ->extraAttributes(['class' => 'custom-stat-widget']);

        if ($user->hasRole('admin')) {
            $stats[] = Stat::make('Total Users', User::count())
                ->description("Total user accounts")
                ->url(UserResource::getUrl('index'))
                ->descriptionIcon('heroicon-s-user')
                ->color('primary')
                ->extraAttributes(['class' => 'custom-stat-widget']);
        }

        $stats[] = Stat::make('Average Article Views', $averageArticleViews)
            ->description("Average article views")
            ->descriptionIcon($icon)
            ->color($color)
            ->extraAttributes(['class' => 'custom-stat-widget']);

        $stats[] = Stat::make('Total Subscriptions', $totalSubscriptions)
            ->description("Total subscriptions count")
            ->url(SubscriptionResource::getUrl('index'))
            ->descriptionIcon('heroicon-s-envelope')
            ->color('primary')
            ->extraAttributes([
                'class' => 'custom-stat-widget'
        ]);

        return $stats;
    }
}
