<?php

namespace App\Filament\Resources\MySelves\Pages;

use App\Filament\Resources\MySelves\MySelfResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMySelves extends ListRecords
{
    protected static string $resource = MySelfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
