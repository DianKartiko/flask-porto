<?php

namespace App\Filament\Resources\Profiles;

use App\Filament\Resources\Profiles\Pages\ManageProfiles;
use App\Models\Profile;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Profile';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('profile_picture')
                    ->image()
                    ->directory('profiles')
                    ->circleCropper()
                    ->imageEditor()
                    ->imageAspectRatio('16:9')
                    ->saveUploadedFileUsing(function ($file) {
                        $filename = str()->uuid() . '.webp';

                        // Memproses gambar menggunakan GD
                        $img = Image::read($file);

                        // Encode ke webp dengan kualitas 80% (sangat ringan)
                        $encoded = $img->toWebp(80);

                        // Simpan ke storage public
                        Storage::disk('public')->put('profiles/' . $filename, $encoded);

                        return 'profiles/' . $filename;
                    }),

                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->label('Role / Jabatan')
                    ->placeholder('Contoh: Lead Developer')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('profile_picture')
                    ->label('Foto Saat Ini')
                    ->circular()
                    ->height(100),
                TextEntry::make('name')
                    ->label('Nama Lengkap')
                    ->weight('bold'),
                TextEntry::make('subtitle')
                    ->label('Pekerjaan/Role'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Profile')
            ->columns([
                ImageColumn::make('profile_picture')
                    ->label('Foto')
                    ->circular(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->fontFamily('inter')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('subtitle')
                    ->label('Role')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProfiles::route('/'),
        ];
    }
}
