<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('degree_name')
                    ->required(),
                TextInput::make('institution')
                    ->required(),
                TextInput::make('start_date')
                    ->required(),
                TextInput::make('end_date')
                    ->default(null),
                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TagsInput::make('tags')
                    ->separator(',')
                    ->suggestions(
                        fn() => \App\Models\Tag::pluck('name')->toArray()
                    ),
            ]);
    }
}
