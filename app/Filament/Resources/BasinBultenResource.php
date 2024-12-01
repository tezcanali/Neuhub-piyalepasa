<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BasinBultenResource\Pages;
use App\Filament\Resources\BasinBultenResource\RelationManagers;
use App\Models\BasinBulten;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BasinBultenResource extends Resource
{
    protected static ?string $model = BasinBulten::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Basın Bülten';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Başlık')
                    ->required()
                    ->columnSpan(6),
                FileUpload::make('file')
                    ->label('PDF Dosyası')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->maxSize(50000)
                    ->disk('public')
                    ->directory('basin-bulten')
                    ->columnSpan(6),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageBasinBultens::route('/'),
        ];
    }
}
