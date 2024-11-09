<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

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
                                    ->directory('students')
                                    ->required(),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('surname')
                                            ->required()
                                            ->maxLength(255),

                                        Select::make('sex')
                                            ->required()
                                            ->options([
                                                'ذكر' => 'ذكر',
                                                'أنثى' => 'أنثى',
                                            ]),

                                        TextInput::make('job')
                                            ->required()
                                            ->maxLength(255),
                                    ]),
                            ]),
                    ]),

                Section::make('Family Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('DadJob')
                                    ->label("Father's Job")
                                    ->maxLength(255),

                                TextInput::make('MomJob')
                                    ->label("Mother's Job")
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Birth Information')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('day')
                                    ->numeric()
                                    ->required()
                                    ->minValue(1)
                                    ->maxValue(31),

                                TextInput::make('month')
                                    ->numeric()
                                    ->required()
                                    ->minValue(1)
                                    ->maxValue(12),

                                TextInput::make('year')
                                    ->numeric()
                                    ->required()
                                    ->minValue(1950)
                                    ->maxValue(date('Y')),

                                TextInput::make('place')
                                    ->required()
                                    ->label('Birth Place')
                                    ->columnSpan(3),
                            ]),
                    ]),

                Section::make('Contact Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('residence')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('local')
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('tel')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Educational Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('inscripted_in')
                                    ->label('Enrolled In')
                                    ->options([
                                        'التعليم-القرآني' => 'التعليم القرآني',
                                        // Add other options as needed
                                    ])
                                    ->required(),

                                TextInput::make('scholar_year')
                                    ->required()
                                    ->maxLength(255),
                            ]),
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

                TextColumn::make('inscripted_in')
                    ->label('Enrolled In')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('scholar_year')
                    ->label('Academic Year')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('sex')
                    ->options([
                        'ذكر' => 'ذكر',
                        'أنثى' => 'أنثى',
                    ]),
                Tables\Filters\SelectFilter::make('inscripted_in')
                    ->label('Enrolled In')
                    ->options([
                        'التعليم-القرآني' => 'التعليم القرآني',
                        // Add other options as needed
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}