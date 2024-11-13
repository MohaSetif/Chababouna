<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use App\Models\Utilisateur;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Student Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Personal Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                FileUpload::make('photo')
                                    ->image()
                                    ->directory('members')
                                    ->visibility('public')
                                    ->preserveFilenames()
                                    ->required()
                                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                                    ->getUploadedFileNameForStorageUsing(
                                        fn (TemporaryUploadedFile $file): string => (string) str(
                                            $file->getClientOriginalName()
                                        )->prepend('member_'),
                                    ),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label("Name")
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('surname')
                                            ->label("Surname")
                                            ->required()
                                            ->maxLength(255),

                                        Select::make('sex')
                                            ->label("Gender")
                                            ->required()
                                            ->options([
                                                'male' => 'ذكر',
                                                'female' => 'أنثى',
                                            ]),

                                        TextInput::make('job')
                                            ->label("Job")
                                            ->maxLength(255),
                                    ]),
                            ]),
                    ]),

                Section::make('Birth Information')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                DatePicker::make('birthdate')
                                    ->format('Y-m-d')
                                    ->displayFormat('d/m/Y')
                                    ->seconds(false)
                                    ->label("Member's Birthdate")
                                    ->required(),

                                TextInput::make('place')
                                    ->required()
                                    ->label('Birth Place')
                                    ->columnSpan(3),
                            ]),
                    ]),

                    Section::make('Additions')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Textarea::make('hobby')
                                    ->maxLength(255)
                                    ->label("Hobbies")
                                    ->required(),

                                TextInput::make('help')
                                    ->required()
                                    ->label('What he/she can provide')
                                    ->columnSpan(3),
                            ]),
                    ]),


                Section::make('Contact Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('residence')
                                    ->label("Address")
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label("Email")
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('tel')
                                    ->label("Phone number")
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),

                    Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'pending',
                        'accepted' => 'accepted',
                        'rejected' => 'rejected',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('photo')
                ->square()
                ->size(40),

            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('surname')
                ->searchable()
                ->sortable(),

            TextColumn::make('sex')
                ->searchable()
                ->sortable(),

            TextColumn::make('email')
                ->searchable()
                ->sortable(),

            TextColumn::make('tel')
                ->searchable(),

            SelectColumn::make('status')
        ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'pending',
                        'accepted' => 'accepted',
                        'rejected' => 'rejected'
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
