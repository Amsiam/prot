<?php

namespace App\Filament\Resources\ResearchAreas\Pages;

use App\Filament\Resources\ResearchAreas\ResearchAreaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageResearchAreas extends ManageRecords
{
    protected static string $resource = ResearchAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
