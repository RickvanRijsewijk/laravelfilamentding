<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Models\Settings;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 100;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('site_name')
                    ->label('Site Name')
                    ->required(),

                Forms\Components\FileUpload::make('site_logo')
                    ->label('Site Logo')
                    ->image()
                    ->disk('public')
                    ->directory('settings/logos')
                    ->nullable(),

                Forms\Components\ColorPicker::make('primary_color')
                    ->label('Primary Color')
                    ->default('#3490dc'),
                ])
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Site Name')
                    ->searchable(),
                ViewColumn::make('primary_color')
                    ->label('Primary Color')
                    ->view('components.color-column'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
            'create' => Pages\CreateSettings::route('/create'),
        ];
    }
}
