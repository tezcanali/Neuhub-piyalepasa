<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CardButton extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.card-button')
            ->schema([
                TextInput::make('section_id')
                    ->label('Section ID')
                    ->columnSpan(6),
                Repeater::make('cards')
                    ->label('Kartlar')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Görsel')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('global/card-button')
                            ->optimize('webp')
                            ->deletable(true)
                            ->acceptedFileTypes(['image/*'])
                            ->columnSpan(3),

                        TextInput::make('title')
                            ->label('Başlık')
                            ->required()
                            ->columnSpan(3),

                        TextInput::make('url')
                            ->label('Bağlantı URL')
                            ->required()
                            ->columnSpan(6),
                    ])
                    ->defaultItems(2)
                    ->collapsible()
                    ->collapsed()
                    ->columns(6)
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
