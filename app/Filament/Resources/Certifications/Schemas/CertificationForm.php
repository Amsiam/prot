<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('issuer')
                            ->required(),
                        DatePicker::make('date')
                            ->required(),
                        TextInput::make('order')
                            ->required()
                            ->numeric()
                            ->default(0),

                        RichEditor::make('description')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public'),
                    ])
            ]);
    }
}
