<?php

namespace App\Filament\Resources\TechnicalSkills\Pages;

use App\Filament\Resources\TechnicalSkills\TechnicalSkillResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTechnicalSkill extends EditRecord
{
    protected static string $resource = TechnicalSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
