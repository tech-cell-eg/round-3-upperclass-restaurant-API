<?php

namespace App\Filament\Admin\Resources\GiftCardDetailResource\Pages;

use App\Filament\Admin\Resources\GiftCardDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGiftCardDetails extends ListRecords
{
    protected static string $resource = GiftCardDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
