<?php

namespace App\Filament\Resources\HonourAwards\Pages;

use App\Filament\Resources\HonourAwards\HonourAwardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHonourAwards extends ListRecords
{
    protected static string $resource = HonourAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
