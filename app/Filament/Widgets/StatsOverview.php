<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Post;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make('Posts' , Post::count()),
            Card::make('Published Post' , Post::where('is_published' , true)->count()),
            Card::make('Pending Possts' , Post::where('is_published' , false)->count())
        ];
    }
}
