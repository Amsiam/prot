<?php

namespace App\Filament\Resources\TechnicalSkills;

use App\Filament\Resources\TechnicalSkills\Pages\CreateTechnicalSkill;
use App\Filament\Resources\TechnicalSkills\Pages\EditTechnicalSkill;
use App\Filament\Resources\TechnicalSkills\Pages\ListTechnicalSkills;
use App\Filament\Resources\TechnicalSkills\Schemas\TechnicalSkillForm;
use App\Filament\Resources\TechnicalSkills\Tables\TechnicalSkillsTable;
use App\Models\TechnicalSkill;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TechnicalSkillResource extends Resource
{
    protected static ?string $model = TechnicalSkill::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Technical Skills & Expertise';

    public static function form(Schema $schema): Schema
    {
        return TechnicalSkillForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TechnicalSkillsTable::configure($table);
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
            'index' => ListTechnicalSkills::route('/'),
            'create' => CreateTechnicalSkill::route('/create'),
            'edit' => EditTechnicalSkill::route('/{record}/edit'),
        ];
    }
}
