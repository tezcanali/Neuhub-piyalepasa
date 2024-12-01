<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ImageSlider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.image-slider')
            ->schema([
                Tabs::make('Düzenleyici')
                    ->tabs([
                        Tabs\Tab::make('İçerik')
                            ->schema([
                                Repeater::make('slides')
                                    ->label('Slaytlar')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Görsel')
                                            ->image()
                                            ->required()
                                            ->disk('public')
                                            ->directory('global/slider')
                                            ->optimize('webp')
                                            ->deletable(true)
                                            ->acceptedFileTypes(['image/*'])
                                            ->columnSpan(6),

                                        TextInput::make('alt')
                                            ->label('Görsel Alt Metni')
                                            ->placeholder('Görsel açıklaması')
                                            ->columnSpan(6),
                                    ])
                                    ->collapsible()
                                    ->collapsed()
                                    ->columns(6)
                                    ->columnSpanFull(),
                            ])
                            ->columns(6),

                        Tabs\Tab::make('Slider Ayarları')
                            ->schema([
                                TextInput::make('sliderClass')
                                    ->label('Ek CSS Sınıfları')
                                    ->placeholder('class1 class2')
                                    ->columnSpan(2),

                                TextInput::make('sliderStyle')
                                    ->label('Özel CSS Stilleri')
                                    ->placeholder('background-color: #fff;')
                                    ->columnSpan(2),

                                TextInput::make('sliderPadding')
                                    ->label('Padding')
                                    ->placeholder('p-4')
                                    ->columnSpan(2),
                            ])
                            ->columns(6),
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
