<?php

namespace App\Filament\Resources;

use Filament\Forms\Set;
use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\FormsComponent;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $slug = 'berita';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul_berita')
                ->label('Judul')
                ->required()
                ->reactive()
                ->afterStateUpdated(function (Set $set, $state) {
                    $set('slug', Str::slug($state));
                }),


            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->readOnly()
                ->disabled()
                ->dehydrated()
                ->required(),

            Forms\Components\RichEditor::make('isi_berita')
                ->label('Isi')
                ->required()
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('gambar_berita')
                ->label('Gambar')
                ->required()
                ->image()
                ->directory('berita')
                ->maxSize(2048),

            Forms\Components\Select::make('kategori')
                ->label('Kategori')
                ->required()
                ->options([
                    'nasional' => 'Nasional (Berita dalam negeri)',
                    'internasional' => 'Internasional (Berita global)',
                    'politik' => 'Politik (Kebijakan, pemerintahan, pemilu)',
                    'ekonomi' => 'Ekonomi & Bisnis (Keuangan, investasi, startup)',
                    'teknologi' => 'Teknologi (Gadget, AI, inovasi)',
                    'olahraga' => 'Olahraga (Sepak bola, F1, eSports, dll.)',
                    'hiburan' => 'Hiburan (Film, musik, selebriti)',
                    'gaya-hidup' => 'Gaya Hidup (Kesehatan, travel, fashion)',
                ])
                ->searchable(),

            Forms\Components\DatePicker::make('tanggal_berita')
                ->label('Tanggal')
                ->required(),

            Select::make('admin_id')
                ->label('Admin')
                ->relationship('admin', 'name')
                ->preload()
                ->searchable()
                ->required(),

            Forms\Components\Toggle::make('trending')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('judul_berita')->label('Judul')->sortable()->searchable(),
            TextColumn::make('slug')->label('Slug')->toggleable(), // Ini boleh dihapus kalau tidak ingin tampil
            TextColumn::make('kategori')->label('Kategori'),
            ImageColumn::make('gambar_berita')->label('Gambar')->circular()->size(40),
            TextColumn::make('tanggal_berita')->label('Tanggal')->date(),
            TextColumn::make('admin.name')->label('Admin')->sortable(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
