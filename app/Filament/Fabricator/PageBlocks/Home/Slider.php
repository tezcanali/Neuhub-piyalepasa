<?php

namespace App\Filament\Fabricator\PageBlocks\Home;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Slider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home.slider')
            ->schema([
                Repeater::make('slides')
                    ->label('Slider Öğeleri')
                    ->schema([
                        FileUpload::make('background_image')
                            ->label('Arka Plan Görseli')
                            ->image()
                            ->required()
                            ->maxSize(150000)
                            ->disk('public')
                            ->directory('home/slider')
                            ->optimize('webp')
                            ->deletable(true)
                            ->acceptedFileTypes(['image/*']),

                        TextInput::make('title')
                            ->label('Başlık')
                            ->required(),

                        TextInput::make('highlight_text')
                            ->label('Vurgulanan Metin')
                            ->required(),

                        TextInput::make('subtitle')
                            ->label('Alt Metin')
                            ->required(),

                        RichEditor::make('description')
                            ->label('Açıklama')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                            ]),
                    ])
                    ->defaultItems(1)
                    ->reorderable()
                    ->collapsible()
                    ->collapsed()
                    ->cloneable()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
