<?php

namespace App\Filament\Resources\TechnicalSkills\Schemas;

use App\Models\Tag;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class TechnicalSkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columns(1)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),
                        TagsInput::make('tags')
                            ->separator(',')
                            ->suggestions(
                                fn() => Tag::pluck('name')->toArray()
                            )->columnSpanFull(),
                    ]),
            ]);
    }
}
