<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Guests';
    protected static ?string $pluralLabel = 'Guests';
    protected static ?string $slug = 'guests';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('username')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\FileUpload::make('foto_guest')
                ->image()
                ->directory('guest-photos')
                ->imagePreviewHeight('100')
                ->label('Foto Guest')
                ->maxSize(2048)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('password')
                ->password()
                ->label('Password')
                ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                ->required(fn(string $context) => $context === 'create')
                ->dehydrated(fn($state) => filled($state))
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('foto_guest')
                ->label('Foto')
                ->circular()
                ->size(40),

            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('username')->sortable(),
            TextColumn::make('email')->sortable(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
