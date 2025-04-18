<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BookingResource\Pages;
use App\Filament\Admin\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('name')
                    ->minLength(3)
                    ->maxLength(255),
                Forms\Components\TextInput::make('guest_number')
                    ->numeric()
                    ->required()
                    ->placeholder('guest_number')
                    ->minValue(0)
                    ->rules(['numeric', 'min:0']),
                Forms\Components\TextInput::make('booking_id')
                    ->required()
                    ->placeholder('booking_id')
                    ->minLength(3)
                    ->maxLength(255),
                DatePicker::make('date')
                    ->required()
                    ->placeholder('Select date')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->closeOnDateSelection(),
                TimePicker::make('time')
                    ->required()
                    ->seconds(false)
                    ->displayFormat('h:i A')
                    ->native(false)
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

                Tables\Columns\TextColumn::make('guest_number')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('booking_id')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('date')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('time')
                    ->time('g:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            // 'create' => Pages\CreateBooking::route('/create'),
            // 'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }

}
