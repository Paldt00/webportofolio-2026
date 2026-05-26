<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;
    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    public static function form(Form $form): Form {
        return $form->schema([
            // Sekarang inputnya jadi RichEditor (sama kayak Deskripsi)
            Forms\Components\RichEditor::make('name')
                ->label('Skills') // Diubah jadi Skills
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            // Ditambah ->html() biar admin panel nampilin formatnya (bukan kode HTML-nya)
            Tables\Columns\TextColumn::make('name')->label('Skills')->html()->searchable(), // Diubah jadi Skills
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListSkills::route('/'),
        ];
    }
}
