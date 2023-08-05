<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('ChangePassword')
                ->form([
                    TextInput::make('new_password')
                        ->required()
                        ->password()
                        ->rule(Password::default())
                        ->label('New Password'),
                    TextInput::make('new_password_confirmation')
                        ->required()
                        ->password()
                        ->rule(Password::default())
                        ->same('new_password')
                ])->action(function (array $data){
                    $this->record->update([
                        'password' => Hash::make($data['new_password'])
                    ]);
                    $this->notify('success' , 'Password updated successfully');
                })
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
