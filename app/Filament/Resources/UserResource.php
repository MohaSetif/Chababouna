<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('filament.forms.name'))
                    ->required()
                    ->maxLength(255),
                Select::make('role_id')
                    ->label(__('filament.forms.role'))
                    ->options([
                        0 => 'User',
                        1 => 'Admin',
                    ])
                    ->required(),
                TextInput::make('email')
                    ->label(__('filament.forms.email'))
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('password')
                    ->label(__('filament.forms.password'))
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament.forms.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label(__('filament.forms.email'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role_id')
                    ->label(__('filament.forms.role'))
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                        0 => 'User',
                        1 => 'Admin',
                        default => 'Unknown',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('filament.forms.created_at'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('email_verified_at')
                    ->label(__('filament.forms.email_verified_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.navigation.users');
    }

    public static function getNavigationGroup(): string
    {
        return __('filament.management.members');
    }
}