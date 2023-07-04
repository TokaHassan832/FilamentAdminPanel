<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort=1;

    protected function getCards(): array
    {
        return [
            Card::make('Posts had been published this month',Post::where('created_at','>', now()->subDays(30))->count())
        ];
    }
}
