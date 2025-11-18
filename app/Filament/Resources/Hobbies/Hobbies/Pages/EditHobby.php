<?php

namespace App\Filament\Resources\Hobbies\Hobbies\Pages;

use App\Filament\Resources\Hobbies\Hobbies\HobbyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHobby extends EditRecord
{
    protected static string $resource = HobbyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
