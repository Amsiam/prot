<?php

namespace App\Filament\Resources\Galaries\Pages;

use App\Filament\Resources\Galaries\GalaryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGalary extends EditRecord
{
    protected static string $resource = GalaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
