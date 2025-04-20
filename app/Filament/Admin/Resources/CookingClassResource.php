<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CookingClassResource\Pages;
use App\Filament\Admin\Resources\CookingClassResource\RelationManagers;
use App\Models\CookingClass;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;

class CookingClassResource extends Resource
{
    protected static ?string $model = CookingClass::class;
    protected static ?string $navigationGroup = 'Classes and Workshop Management';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->placeholder('title')
                    ->minLength(3)
                    ->maxLength(255),
                Forms\Components\TextInput::make('sub_title')
                    ->required()
                    ->placeholder('sub_title')
                    ->minLength(3)
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('classes')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull()
                    ->default(fn ($record) => $record?->image ? 'classes/'.$record->image : null),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->placeholder('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->placeholder('price')
                    ->minValue(0)
                    ->prefix('$')
                    ->rules(['numeric', 'min:0']),
                Forms\Components\TextInput::make('language')
                    ->required()
                    ->placeholder('language')
                    ->minLength(3)
                    ->maxLength(255),
                DatePicker::make('date')
                    ->required()
                    ->placeholder('Select date')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->closeOnDateSelection(),
                Select::make('teacher_id')
                    ->label('Teacher')
                    ->required()
                    ->placeholder('Choose Teacher')
                    ->relationship('teacher', 'name')
                    ->searchable(['name'])
                    ->preload()
                    ->searchDebounce(300)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) > 30) {
                            return $state;
                        }
                        return null;
                    }),

                Tables\Columns\TextColumn::make('sub_title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->toggleable(),

                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->width(50)
                    ->height(50)
                    ->toggleable()
                    ->getStateUsing(function ($record) {
                        return $record->image ? 'classes/'.basename($record->image) : null;
                    }),

                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->limit(40)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = strip_tags($column->getState());
                        if (strlen($state) > 100) {
                            return $state;
                        }
                        return null;
                    })
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('language')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Teacher')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('date')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)

                ])
            ->filters([
                    //
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
            'index' => Pages\ListCookingClasses::route('/'),
            'create' => Pages\CreateCookingClass::route('/create'),
            'edit' => Pages\EditCookingClass::route('/{record}/edit'),
        ];
    }
}
