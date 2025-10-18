<?php

namespace App\Filament\Resources\Posts\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Posts', Post::all()->count())->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')->color('danger'),
            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
