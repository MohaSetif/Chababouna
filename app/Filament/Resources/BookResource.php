<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Library Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('photo')
                    ->image()
                    ->directory('books')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->required()
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) str(
                            $file->getClientOriginalName()
                        )->prepend('book_'),
                    ),
                
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),

                TextInput::make('writer_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Author Name'),

                TextInput::make('field')
                    ->required()
                    ->maxLength(255)
                    ->label('Category/Field'),

                TextInput::make('copies')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                TextInput::make('parts')
                    ->required()
                    ->numeric()
                    ->minValue(1),

                DatePicker::make('insert_date')
                    ->required()
                    ->label('Date Added'),

                TextInput::make('publication')
                    ->required()
                    ->maxLength(255)
                    ->label('Publisher'),

                TextInput::make('documentation')
                    ->required()
                    ->maxLength(255),

                Textarea::make('review')
                    ->rows(3)
                    ->maxLength(255)
                    ->columnSpan(2),

                Textarea::make('note')
                    ->rows(3)
                    ->maxLength(255)
                    ->columnSpan(2),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->square()
                    ->size(50),
                
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('writer_name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('field')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('copies')
                    ->sortable(),

                TextColumn::make('parts')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('field')
                    ->label('Category')
                    ->options(fn () => Book::distinct()->pluck('field', 'field')->toArray()),
                
                Tables\Filters\SelectFilter::make('publication')
                    ->label('Publisher')
                    ->options(fn () => Book::distinct()->pluck('publication', 'publication')->toArray()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}