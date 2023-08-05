<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\UserResource;
use App\Models\Category;
use App\Models\Post;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestPosts extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected function getTableQuery(): Builder
    {
        return Post::latest()->take(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('category.name')
                ->url(fn(Post $record) => CategoryResource::getUrl('edit' , ['record' => $record->category])),
            Tables\Columns\TextColumn::make('author.name')
                ->url(fn(Post $record) => UserResource::getUrl('edit' , ['record' => $record->author])),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return  false;
    }
}
