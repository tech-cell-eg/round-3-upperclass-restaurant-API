<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MenuItemResource\Pages;
use App\Filament\Admin\Resources\MenuItemResource\RelationManagers;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('name')
                    ->minLength(3)
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('menu_items')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull()
                    ->default(fn ($record) => $record?->image ? 'menu_items/'.$record->image : null),
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
                Forms\Components\TextInput::make('tag')
                    ->required()
                    ->placeholder('tag')
                    ->minLength(3)
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->placeholder('Choose Category')
                    ->relationship('category', 'name')
                    ->searchable(['name'])
                    ->preload()
                    ->searchDebounce(300)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

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

                Tables\Columns\ImageColumn::make('image')
                    ->width(50)
                    ->height(50)
                    ->toggleable()
                    ->getStateUsing(function ($record) {
                        return filter_var($record->image, FILTER_VALIDATE_URL)
                            ? $record->image
                            : ($record->image ? 'menu_items/'.basename($record->image) : null);
                    }),

                Tables\Columns\TextColumn::make('tag')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->placeholder('No Tag'),

                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
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
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
