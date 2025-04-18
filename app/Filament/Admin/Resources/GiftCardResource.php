<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GiftCardResource\Pages;
use App\Filament\Admin\Resources\GiftCardResource\RelationManagers;
use App\Models\GiftCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GiftCardResource extends Resource
{
    protected static ?string $model = GiftCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->placeholder('title')
                    ->minLength(3)
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('gift_cards')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull()
                    ->default(fn ($record) => $record?->image ? 'gift_cards/'.$record->image : null),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->placeholder('price')
                    ->minValue(0)
                    ->prefix('$')
                    ->rules(['numeric', 'min:0'])
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->placeholder('description')
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

                Tables\Columns\ImageColumn::make('image')
                    ->width(50)
                    ->height(50)
                    ->toggleable()
                    ->getStateUsing(function ($record) {
                        return filter_var($record->image, FILTER_VALIDATE_URL)
                            ? $record->image
                            : ($record->image ? 'gift_cards/'.basename($record->image) : null);
                    }),

                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable()
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
            'index' => Pages\ListGiftCards::route('/'),
            'create' => Pages\CreateGiftCard::route('/create'),
            'edit' => Pages\EditGiftCard::route('/{record}/edit'),
        ];
    }
}
