<?php

namespace App\Filament\Resources\MySelves\Pages;

use App\Filament\Resources\MySelves\MySelfResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMySelf extends EditRecord
{
    protected static string $resource = MySelfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
