<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    protected static ?string $navigationGroup = 'others';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->disabled(),
                Forms\Components\Textarea::make('message')
                    ->disabled(),
                Forms\Components\Toggle::make('answered')
                    ->onColor('success')
                    ->offColor('danger')

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    Tables\Columns\TextColumn::make('name'),
                    Tables\Columns\TextColumn::make('subject'),
                    Tables\Columns\TextColumn::make('message')
                        ->limit(50),
                    IconColumn::make('answered')
                        ->boolean()
            ])
            ->filters([
                Tables\Filters\Filter::make('Answered')
                    ->form([
                        Forms\Components\Toggle::make('pending')
                            ->onColor('success')
                            ->offColor('danger')

                    ])->query(function (Builder $query , array $data) {
                        $query->when($data['pending'] , fn($query) => $query->where('answered' , false));
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
            'index' => Pages\ListContacts::route('/'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
