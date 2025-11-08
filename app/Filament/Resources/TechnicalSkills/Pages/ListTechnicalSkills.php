<?php

namespace App\Filament\Resources\TechnicalSkills\Pages;

use App\Filament\Resources\TechnicalSkills\TechnicalSkillResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTechnicalSkills extends ListRecords
{
    protected static string $resource = TechnicalSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
