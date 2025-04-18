<?php

namespace App\Filament\Admin\Resources\CookingClassResource\Pages;

use App\Filament\Admin\Resources\CookingClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCookingClass extends EditRecord
{
    protected static string $resource = CookingClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
