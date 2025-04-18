<?php

namespace App\Filament\Admin\Resources\GetInTouchResource\Pages;

use App\Filament\Admin\Resources\GetInTouchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGetInTouch extends EditRecord
{
    protected static string $resource = GetInTouchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
