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
use Filament\Tables\Columns\BadgeColumn;
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
                                    ->label(__('filament.forms.photo'))
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
                                        ->label(__('filament.forms.name'))
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('surname')
                                        ->label(__('filament.forms.surname'))
                                            ->required()
                                            ->maxLength(255),

                                        Select::make('sex')
                                        ->label(__('filament.forms.sex'))
                                            ->required()
                                            ->options([
                                                'male' => 'ذكر',
                                                'female' => 'أنثى',
                                            ]),

                                        TextInput::make('job')
                                        ->label(__('filament.forms.job'))
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
                                ->label(__('filament.forms.dad_job'))
                                    ->maxLength(255),

                                TextInput::make('mom_job')
                                    ->label(__('filament.forms.mom_job'))
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
                                    ->label(__('filament.forms.birthdate'))
                                    ->required(),

                                TextInput::make('place')
                                    ->required()
                                    ->label(__('filament.forms.place'))
                                    ->columnSpan(3),
                            ]),
                    ]),

                Section::make('Contact Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('residence')
                                ->label(__('filament.forms.residence'))
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('study_local')
                                ->label(__('filament.forms.study_local'))
                                    ->maxLength(255),

                                TextInput::make('email')
                                ->label(__('filament.forms.email'))
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('dad_tel')
                                ->label(__('filament.forms.dad_tel'))
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('tel')
                                ->label(__('filament.forms.tel'))
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),

                    Section::make('Educational Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('scholar_year')
                                ->label(__('filament.forms.scholar_year'))
                                    ->options([
                                        'التمهيدي' => 'التمهيدي',
                                        'التحضيري' => 'التحضيري',
                                        'الابتدائي' => 'الابتدائي',
                                        'المتوسطي' => 'المتوسطي',
                                        'الثانوي' => 'الثانوي',
                                        'الجامعي' => 'الجامعي',
                                        'خيار آخر' => 'خيار آخر',
                                    ])
                                    ->required()
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                ->label(__('filament.forms.photo'))
                    ->square()
                    ->size(40),

                TextColumn::make('name')
                ->label(__('filament.forms.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('surname')
                ->label(__('filament.forms.surname'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sex')
                ->label(__('filament.forms.sex'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                ->label(__('filament.forms.email'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tel')
                ->label(__('filament.forms.tel'))
                    ->searchable(),

                TextColumn::make('scholar_year')
                ->label(__('filament.forms.scholar_year'))
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label(__('filament.forms.status'))
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'accepted',
                        'danger' => 'rejected',
                    ])
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('sex')
                    ->options([
                        'male' => 'ذكر',
                        'female' => 'أنثى',
                    ]),

                Tables\Filters\SelectFilter::make('scholar_year')
                    ->options([
                        'التمهيدي' => 'التمهيدي',
                        'التحضيري' => 'التحضيري',
                        'الابتدائي' => 'الابتدائي',
                        'المتوسطي' => 'المتوسطي',
                        'الثانوي' => 'الثانوي',
                        'الجامعي' => 'الجامعي',
                        'خيار آخر' => 'خيار آخر',
                    ]),
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

    public static function getNavigationLabel(): string
    {
        return __('filament.navigation.students');
    }

    public static function getNavigationGroup(): string
    {
        return __('filament.management.students');
    }
}