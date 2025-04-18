<?php

namespace App\Filament\Admin\Resources\GiftCardDetailResource\Pages;

use App\Filament\Admin\Resources\GiftCardDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGiftCardDetail extends EditRecord
{
    protected static string $resource = GiftCardDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
