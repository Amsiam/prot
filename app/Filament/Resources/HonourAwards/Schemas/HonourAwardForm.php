<?php

namespace App\Filament\Resources\HonourAwards\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HonourAwardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('awarded_by')
                    ->default(null),
                TextInput::make('date')
                    ->default(null),
            ]);
    }
}
