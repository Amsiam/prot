<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('organization')
                    ->placeholder('e.g., Company Name, Institution')
                    ->default(null),
                TextInput::make('location')
                    ->default(null),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                Toggle::make('is_current')
                    ->required(),
                TextInput::make('employment_type')
                    ->placeholder('e.g., Full-time, Part-time, Internship')
                    ->default(null),
                RichEditor::make('summary')
                    ->default(null)
                    ->columnSpanFull(),
                RichEditor::make('responsibilities')
                    ->default(null)
                    ->columnSpanFull(),
                RichEditor::make('achievements')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('link')
                    ->default(null),
                TagsInput::make('tags')
                    ->separator(',')
                    ->suggestions(
                        fn() => \App\Models\Tag::pluck('name')->toArray()
                    ),
            ]);
    }
}
