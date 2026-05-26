<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PortofolioResource\Pages;
use App\Models\Portofolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Portofolio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('portofolios')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                // Category diubah jadi Website Category
                Forms\Components\Select::make('category')
                    ->label('Website Category')
                    ->options([
                        'Web Application' => 'Web Application',
                        'Company Profile' => 'Company Profile',
                        'E-Commerce' => 'E-Commerce',
                        'Landing Page' => 'Landing Page',
                        'Personal Website' => 'Personal Website',
                    ])
                    ->required(),

                // Nama Client diubah jadi Client Name
                Forms\Components\TextInput::make('client_name')
                    ->label('Client Name')
                    ->maxLength(255),

                // Tanggal Proyek diubah jadi Project Creation Date
                Forms\Components\DatePicker::make('year')
                    ->label('Project Creation Date')
                    ->format('Y-m-d')
                    ->displayFormat('d - m - Y'),

                Forms\Components\Select::make('role')
                    ->options([
                        'Fullstack Developer' => 'Fullstack Developer',
                        'Frontend Developer' => 'Frontend Developer',
                        'Backend Developer' => 'Backend Developer',
                        'UI/UX Designer' => 'UI/UX Designer',
                        'Project Manager' => 'Project Manager',
                    ])
                    ->required(),

                // Description diubah jadi Website Description
                Forms\Components\Textarea::make('description')
                    ->label('Website Description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category')->label('Website Category')->searchable(),
                Tables\Columns\TextColumn::make('client_name')->label('Client Name')->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Project Creation Date')
                    ->date('d - m - Y')
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortofolios::route('/'),
            'create' => Pages\CreatePortofolio::route('/create'),
            'edit' => Pages\EditPortofolio::route('/{record}/edit'),
        ];
    }
}
