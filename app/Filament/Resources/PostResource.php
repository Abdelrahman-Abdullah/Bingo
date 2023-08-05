<?php

namespace App\Filament\Resources;

use App\Models\User;
use Closure;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;




class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';
    protected static ?int $navigationSort = 3;
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationGroup = 'core';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Select::make('author_id')
                        ->label('Author')
                        ->options(User::where('is_admin' , 1)->pluck('name')),

                    Forms\Components\Select::make('Category')
                        ->relationship('category' , 'name'),

                    TextInput::make('title')
                        ->reactive()
                        ->afterStateUpdated(function (Closure $set, $state) {
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug'),
                    Textarea::make('content'),
                    FileUpload::make('thumbnail'),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Published')
                        ->onColor('success')
                        ->offColor('danger'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')->limit(10),

                TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author.name')
                    ->searchable()
                    ->sortable()
                    ->url(fn(Post $record) => UserResource::getUrl('edit' , ['record' => $record->author])),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
            ])
            ->filters([
                //
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
            RelationManagers\CommentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'author.name', 'category.name'];
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }

}
