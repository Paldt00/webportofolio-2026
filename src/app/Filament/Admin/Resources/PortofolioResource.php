<?php

namespace App\Filament\Admin\Resources; // <-- PERBAIKAN UTAMA: Ditambahkan 'Admin' sesuai folder lu

use App\Filament\Admin\Resources\PortofolioResource\Pages\ListPortofolios; // <-- Diubah agar mengarah ke folder Admin
use App\Filament\Admin\Resources\PortofolioResource\Pages\CreatePortofolio; // <-- Diubah agar mengarah ke folder Admin
use App\Filament\Admin\Resources\PortofolioResource\Pages\EditPortofolio; // <-- Diubah agar mengarah ke folder Admin
use App\Models\Portofolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('category')
                    ->maxLength(255),

                TextInput::make('client')
                    ->maxLength(255),

                TextInput::make('year')
                    ->maxLength(255),

                TextInput::make('role')
                    ->maxLength(255),

                TextInput::make('link')
                    ->maxLength(255),

                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category')->searchable(),
                TextColumn::make('year')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => ListPortofolios::route('/'),
            'create' => CreatePortofolio::route('/create'),
            'edit' => EditPortofolio::route('/{record}/edit'),
        ];
    }
}
