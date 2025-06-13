<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Admins';
    protected static ?string $pluralLabel = 'Admins';
    protected static ?string $slug = 'admins';

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

            Forms\Components\TextInput::make('telp_admin')
                ->required()
                ->label('Telepon')
                ->maxLength(20),

            Forms\Components\FileUpload::make('foto_admin')
                ->image()
                ->directory('admin-photos')
                ->imagePreviewHeight('100')
                ->label('Foto Admin')
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
            ImageColumn::make('foto_admin')
                ->label('Foto')
                ->circular()
                ->size(40),

            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('username')->sortable(),
            TextColumn::make('email'),
            TextColumn::make('telp_admin')->label('Telepon'),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }

    // Agar tidak munculkan Admin selain di superadmin
    public static function shouldRegisterNavigation(): bool
    {
        $admin = auth('admin')->user();

        return $admin && $admin->email === 'superadmin@winni.com';
    }
}
