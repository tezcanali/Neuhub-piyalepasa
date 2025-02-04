<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ProjeGallery extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.proje-gallery')
            ->schema([
                TextInput::make('title')
                    ->label('Başlık'),
                Repeater::make('images')
                ->label('Galeri')
                ->schema([
                    FileUpload::make('image')
                        ->label('Görsel')
                        ->image()
                        ->required()
                        ->disk('public')
                        ->directory('global/gallery')
                        ->optimize('webp')
                        ->deletable(true)
                        ->acceptedFileTypes(['image/*'])
                        ->columnSpan(6),
                    TextInput::make('alt_tag')
                    ->label('Image Alt Tag')
                        ->columnSpan(6),
                ])
                ->collapsible()
                ->collapsed()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
