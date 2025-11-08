<?php

namespace App\Filament\Resources\Publications\Schemas;

use App\Models\Tag;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([

                        RichEditor::make('title')
                            ->required()->columnSpanFull(),
                        RichEditor::make('authors')
                            ->default(null)->columnSpanFull(),
                        RichEditor::make('publication_name')
                            ->placeholder('e.g., Journal of XYZ, Conference ABC')
                            ->required()->columnSpanFull(),
                        TextInput::make('pages'),
                        RichEditor::make('contribution')
                            ->label("My Contribution")
                            ->default(null)
                            ->columnSpanFull(),
                        TextInput::make('link')
                            ->default(null),

                        Select::make('status')
                            ->options([
                                'Published' => 'Published',
                                'In Review' => 'In Review',
                    'In Progress' => 'In Progress',
                                'Draft' => 'Draft',
                            ])
                            ->default('Draft')
                            ->native(false)
                            ->reactive(),
                        RichEditor::make('abstract')
                            ->label('Status and Focus Area')
                            ->visible(fn($get) => $get('status') !== 'Published')
                            ->default(null)
                            ->columnSpanFull(),
                        TagsInput::make('tags')
                            ->separator(',')
                            ->suggestions(
                                fn() => Tag::pluck('name')->toArray()
                            )
                    ])
            ]);
    }
}
