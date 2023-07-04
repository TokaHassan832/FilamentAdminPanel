<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestPosts extends BaseWidget
{
    protected static ?int $sort=2;

    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Post::with('category')->latest()->take(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('created_at'),
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('category.name'),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
