<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SettingResource\Pages;
use App\Filament\Admin\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationGroup = 'Settings Management';
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->regex('/^[a-zA-Z0-9_]+$/')
                    ->label('Setting Key')
                    ->helperText('Only letters, numbers, and underscores are allowed. Must be unique.')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('value')
                    ->required()
                    ->label('Setting Value')
                    ->helperText('Enter valid JSON data. For simple values, use quotes. Example: "value" or {"key": "value"}')
                    ->columnSpanFull()
                    ->afterStateHydrated(function (Forms\Components\Textarea $component, $state) {
                        try {
                            $decoded = is_string($state) ? json_decode($state, true) : $state;
                            $component->state(
                                json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
                            );
                        } catch (\Exception $e) {
                            $component->state($state);
                        }
                    })
                    ->formatStateUsing(function ($state) {
                        try {
                            $decoded = is_string($state) ? json_decode($state, true) : $state;
                            return json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                        } catch (\Exception $e) {
                            return $state;
                        }
                    })
                    ->rules([
                        function () {
                            return function (string $attribute, $value, Closure $fail) {
                                if (empty($value)) {
                                    return;
                                }

                                try {
                                    json_decode($value);
                                    if (json_last_error() !== JSON_ERROR_NONE) {
                                        $fail('The value must be valid JSON.');
                                    }
                                } catch (\Exception $e) {
                                    $fail('The value must be valid JSON.');
                                }
                            };
                        },
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable()
                    ->label('Key'),

                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->searchable()
                    ->label('Value')
                    ->formatStateUsing(fn (string $state): string => strlen($state) > 50 ? substr($state, 0, 50).'...' : $state),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
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
                    }),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
