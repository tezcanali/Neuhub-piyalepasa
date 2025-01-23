<?php

namespace App\Filament\Fabricator\PageBlocks\Contact;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Adress extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('contact.adress')
            ->schema([
                TextInput::make('title')
                    ->label('Başlık'),
                FileUpload::make('image')
                    ->label('Görsel')
                    ->image()
                    ->required()
                    ->maxSize(550000)
                    ->disk('public')
                    ->directory('contact/address')
                    ->optimize('webp')
                    ->deletable(true)
                    ->acceptedFileTypes(['image/*']),
                Repeater::make('offices')
                    ->schema([
                        TextInput::make('title')
                            ->label('Ofis Başlığı')
                            ->required(),
                        RichEditor::make('address')
                            ->label('Adres')
                            ->required(),
                        TextInput::make('email')
                            ->label('E-posta')
                            ->email()
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefon')
                            ->tel()
                            ->required(),
                        TextInput::make('mobile')
                            ->label('Mobil Telefon')
                            ->tel(),
                        TextInput::make('yol_tarif')
                            ->label('Yol Tarif URL'),
                    ])
                    ->label('Ofisler')
                    ->collapsible()
                    ->collapsed(),

                Repeater::make('locations')
                    ->schema([
                        TextInput::make('name')
                            ->label('Konum Adı')
                            ->required(),
                        TextInput::make('duration')
                            ->label('Süre')
                            ->required(),
                    ])
                    ->label('Yakın Konumlar')
                    ->collapsible()
                ->collapsed(),
            ])->visible(fn ($get) => $get('../layout') == 'contact');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
