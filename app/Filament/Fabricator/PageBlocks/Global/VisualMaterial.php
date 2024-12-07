<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class VisualMaterial extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.visual-material')
            ->schema([
                TextInput::make('title')
                ->label('Başlık'),
                Repeater::make('files')
                ->label('Dosyalar')
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                    ->columnSpan(6),
                    FileUpload::make('image')
                        ->label('Kapak Görseli')
                        ->image()
                        ->required()
                        ->disk('public')
                        ->directory('global/visual-material')
                        ->optimize('webp')
                        ->deletable(true)
                        ->acceptedFileTypes(['image/*'])
                        ->columnSpan(6),
                    TextInput::make('buttonTitle')
                        ->label('Buton Başlık')
                        ->columnSpan(6),
                    FileUpload::make('file')
                        ->label('Döküman / Dosya')
                        ->preserveFilenames()
                        ->disk('public')
                        ->required()
                        ->directory('file')
                        ->columnSpan(6),
                ])
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
