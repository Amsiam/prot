<?php

namespace App\Filament\Resources\MySelves\Schemas;

use App\Models\Tag;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MySelfForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()->columnSpanFull(),
                TextInput::make('subtitle')
                    ->required()->columnSpanFull(),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('profile_image')
                    ->image()
                    ->disk('public'),
                TagsInput::make('tags')
                    ->separator(',')
                    ->suggestions(
                        fn() => Tag::pluck('name')->toArray()
                    )
            ]);
    }
}
