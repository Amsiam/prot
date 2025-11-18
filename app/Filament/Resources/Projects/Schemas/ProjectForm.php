<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Tag;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->columnSpanFull(),
                ColorPicker::make('color')
                    ->label('Border Color')
                    ->nullable(),
                TagsInput::make('tags')
                    ->separator(',')
                    ->suggestions(
                        fn() => Tag::pluck('name')->toArray()
                    )
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Repeater::make('images')
                    ->relationship()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->disk('public'),
                        TextInput::make('caption'),
                        TextInput::make('order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columnSpanFull()
                    ->columns(3)
                    ->orderColumn('order'),
                Repeater::make('videos')
                    ->relationship()
                    ->schema([
                        FileUpload::make('video_file')
                            ->label('Upload Video File')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                            ->maxSize(102400)
                            ->disk('public')
                            ->helperText('Upload a video file (MP4, WebM, OGG) - Max 100MB'),
                        TextInput::make('video_url')
                            ->label('OR Video URL (YouTube, Vimeo, etc.)')
                            ->url()
                            ->helperText('Leave empty if uploading a file above'),
                        TextInput::make('title'),
                        TextInput::make('order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columnSpanFull()
                    ->columns(3)
                    ->orderColumn('order'),
            ]);
    }
}
