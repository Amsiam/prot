<?php

namespace App\Filament\Resources\Galaries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('link')
                    ->default(null),
                TextInput::make('category')
                    ->default(null),

            Repeater::make('images')
                ->label('Galary Images')
                ->relationship()
                ->schema([
                    FileUpload::make('image_path')
                        ->image()
                        ->required()
                        ->disk('public'),
                ])
                ->minItems(1)
                ->columnSpanFull(),
            ]);
    }
}
