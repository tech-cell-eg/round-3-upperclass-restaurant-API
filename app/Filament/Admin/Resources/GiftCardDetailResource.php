<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GiftCardDetailResource\Pages;
use App\Filament\Admin\Resources\GiftCardDetailResource\RelationManagers;
use App\Models\GiftCardDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GiftCardDetailResource extends Resource
{
    protected static ?string $model = GiftCardDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('gift_card_id')
                    ->label('Gift Card')
                    ->required()
                    ->placeholder('Choose the gift card you want to give this detail to')
                    ->relationship('giftCard', 'title')
                    ->searchable(['title'])
                    ->preload()
                    ->searchDebounce(300)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('detail')
                    ->required()
                    ->placeholder('detail')
                    ->minLength(3)
                    ->maxLength(255)
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

                Tables\Columns\TextColumn::make('detail')
                    ->searchable()
                    ->sortable()
                    ->limit(100)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) > 30) {
                            return $state;
                        }
                        return null;
                    }),

                Tables\Columns\TextColumn::make('giftCard.title')
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
            'index' => Pages\ListGiftCardDetails::route('/'),
            'create' => Pages\CreateGiftCardDetail::route('/create'),
            'edit' => Pages\EditGiftCardDetail::route('/{record}/edit'),
        ];
    }
}
