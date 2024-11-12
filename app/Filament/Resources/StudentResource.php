<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
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
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                                    ->visibility('public')
                                    ->preserveFilenames()
                                    ->required()
                                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                                    ->getUploadedFileNameForStorageUsing(
                                        fn (TemporaryUploadedFile $file): string => (string) str(
                                            $file->getClientOriginalName()
                                        )->prepend('student_'),
                                    ),

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
                                TextInput::make('dad_job')
                                    ->label("Father's Job")
                                    ->maxLength(255),

                                TextInput::make('mom_job')
                                    ->label("Mother's Job")
                                    ->maxLength(255),
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
                                    ->label("Student's Birthdate")
                                    ->required(),

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
                                    ->label("Address")
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('study_local')
                                    ->label("Study Local")
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label("Email")
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('dad_tel')
                                    ->label("Parent's Phone number")
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('tel')
                                    ->label("Phone number")
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Educational Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
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