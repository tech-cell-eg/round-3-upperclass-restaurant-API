<?php

namespace App\Filament\Admin\Resources\CookingClassResource\Pages;

use App\Filament\Admin\Resources\CookingClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCookingClasses extends ListRecords
{
    protected static string $resource = CookingClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
