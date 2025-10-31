<?php

namespace App\Filament\Resources\MySelves;

use App\Filament\Resources\MySelves\Pages\CreateMySelf;
use App\Filament\Resources\MySelves\Pages\EditMySelf;
use App\Filament\Resources\MySelves\Pages\ListMySelves;
use App\Filament\Resources\MySelves\Schemas\MySelfForm;
use App\Filament\Resources\MySelves\Tables\MySelvesTable;
use App\Models\MySelf;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MySelfResource extends Resource
{
    protected static ?string $model = MySelf::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'myself';

    public static function form(Schema $schema): Schema
    {
        return MySelfForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MySelvesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMySelves::route('/'),
            'create' => CreateMySelf::route('/create'),
            'edit' => EditMySelf::route('/{record}/edit'),
        ];
    }
}
