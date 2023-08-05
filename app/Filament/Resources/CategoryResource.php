<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'core';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->rule('String')
                    ->unique(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date('d/m/y H:i')
            ])
            ->filters([
                Filter::make('Category')
                    ->form([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Date From') ,
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Date Until')

                    ])->query(function (array $data , Builder $query ){
                        return $query
                            ->where('name', 'like', '%' . $data['name'] . '%')

                            ->when($data['created_from'], fn($query) => $query->whereDate('created_at', '>=', $data))
                            ->when($data['created_until'], fn($query) => $query->whereDate('created_at', '<=', $data));
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

}
