<?php

namespace App\Filament\Resources\HonourAwards\Pages;

use App\Filament\Resources\HonourAwards\HonourAwardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHonourAward extends EditRecord
{
    protected static string $resource = HonourAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
