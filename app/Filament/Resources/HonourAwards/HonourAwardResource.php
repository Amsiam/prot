<?php

namespace App\Filament\Resources\HonourAwards;

use App\Filament\Resources\HonourAwards\Pages\CreateHonourAward;
use App\Filament\Resources\HonourAwards\Pages\EditHonourAward;
use App\Filament\Resources\HonourAwards\Pages\ListHonourAwards;
use App\Filament\Resources\HonourAwards\Schemas\HonourAwardForm;
use App\Filament\Resources\HonourAwards\Tables\HonourAwardsTable;
use App\Models\HonourAward;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HonourAwardResource extends Resource
{
    protected static ?string $model = HonourAward::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Honours And Awards';

    public static function form(Schema $schema): Schema
    {
        return HonourAwardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HonourAwardsTable::configure($table);
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
            'index' => ListHonourAwards::route('/'),
            'create' => CreateHonourAward::route('/create'),
            'edit' => EditHonourAward::route('/{record}/edit'),
        ];
    }
}
