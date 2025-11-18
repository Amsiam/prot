<?php

namespace App\Filament\Resources\Hobbies\Hobbies;

use App\Filament\Resources\Hobbies\Hobbies\Pages\CreateHobby;
use App\Filament\Resources\Hobbies\Hobbies\Pages\EditHobby;
use App\Filament\Resources\Hobbies\Hobbies\Pages\ListHobbies;
use App\Filament\Resources\Hobbies\Hobbies\Schemas\HobbyForm;
use App\Filament\Resources\Hobbies\Hobbies\Tables\HobbiesTable;
use App\Models\Hobby;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HobbyResource extends Resource
{
    protected static ?string $model = Hobby::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return HobbyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HobbiesTable::configure($table);
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
            'index' => ListHobbies::route('/'),
            'create' => CreateHobby::route('/create'),
            'edit' => EditHobby::route('/{record}/edit'),
        ];
    }
}
