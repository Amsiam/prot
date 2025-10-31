<?php

namespace App\Filament\Resources\Galaries;

use App\Filament\Resources\Galaries\Pages\CreateGalary;
use App\Filament\Resources\Galaries\Pages\EditGalary;
use App\Filament\Resources\Galaries\Pages\ListGalaries;
use App\Filament\Resources\Galaries\Schemas\GalaryForm;
use App\Filament\Resources\Galaries\Tables\GalariesTable;
use App\Models\Galary;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalaryResource extends Resource
{
    protected static ?string $model = Galary::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GalaryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalariesTable::configure($table);
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
            'index' => ListGalaries::route('/'),
            'create' => CreateGalary::route('/create'),
            'edit' => EditGalary::route('/{record}/edit'),
        ];
    }
}
