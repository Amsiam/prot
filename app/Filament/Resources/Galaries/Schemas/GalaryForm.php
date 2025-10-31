<?php

namespace App\Filament\Resources\Galaries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GalaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image_path')
                    ->image()
                    ->required()
                    ->disk('public'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('link')
                    ->default(null),
                TextInput::make('category')
                    ->default(null),
            ]);
    }
}
