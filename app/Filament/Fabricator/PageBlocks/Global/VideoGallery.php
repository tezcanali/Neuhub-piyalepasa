<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class VideoGallery extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.video-gallery')
            ->schema([
                TextInput::make('title')
                ->label('Başlık'),
                Repeater::make('galleries')
                ->label('Video Galeri')
                ->schema([
                    FileUpload::make('image')
                        ->label('Kapak Görseli')
                        ->image()
                        ->required()
                        ->disk('public')
                        ->directory('global/video-gallery')
                        ->optimize('webp')
                        ->deletable(true)
                        ->acceptedFileTypes(['image/*']),
                    TextInput::make('title')
                        ->label('Başlık'),
                    TextInput::make('url')
                        ->label('Video URL'),
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
