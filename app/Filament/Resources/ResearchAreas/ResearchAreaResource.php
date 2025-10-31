<?php

namespace App\Filament\Resources\ResearchAreas;

use App\Filament\Resources\ResearchAreas\Pages\ManageResearchAreas;
use App\Models\ResearchArea;
use App\Models\Tag;
use BackedEnum;
use Faker\Core\Color;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ResearchAreaResource extends Resource
{
    protected static ?string $model = ResearchArea::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)->columnSpanFull(),
                RichEditor::make('description')
                    ->required()->columnSpanFull(),
                ColorPicker::make('color')
                    ->label('Border Color')
                    ->nullable(),
                TagsInput::make('tags')
                    ->separator(',')
                    ->suggestions(
                        fn() => Tag::pluck('name')->toArray()
                    )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                ColorColumn::make('color')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageResearchAreas::route('/'),
        ];
    }
}
