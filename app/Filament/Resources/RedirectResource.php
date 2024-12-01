<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectResource\Pages;
use App\Filament\Resources\RedirectResource\RelationManagers;
use App\Models\Redirect;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RedirectResource extends Resource
{
    protected static ?string $model = Redirect::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Yönlendirmeler';

    protected static ?string $navigationParentItem = 'Genel Ayarlar';

    protected static ?string $navigationGroup = 'Sistem';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('old_url')
                    ->required()
                    ->unique()
                    ->label('Eski URL')
                    ->placeholder('/ olmadan eklemelisiniz.'),
                TextInput::make('new_url')
                    ->required()
                    ->label('Yeni URL')
                    ->placeholder('/ olmadan eklemelisiniz.'),
                Select::make('type')
                    ->options([
                        '301' => '301 Kalıcı Yönlendirme',
                        '302' => '302 Geçici Yönlendirme',
                    ])
                    ->default('301')
                    ->label('Yönlendirme Türü'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('old_url')->label('From'),
                Tables\Columns\TextColumn::make('new_url')->label('To'),
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
            'index' => Pages\ManageRedirects::route('/'),
        ];
    }
}
