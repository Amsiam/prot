<?php

namespace App\Filament\Resources\Galaries\Pages;

use App\Filament\Resources\Galaries\GalaryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGalaries extends ListRecords
{
    protected static string $resource = GalaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
