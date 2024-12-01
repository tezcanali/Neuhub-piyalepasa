<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MahalList extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.mahal-list')
            ->schema([
                Tabs::make('Düzenleyici')
                    ->tabs([
                        Tabs\Tab::make('Yerleşim Planı')
                            ->schema([
                                FileUpload::make('planImage')
                                    ->label('Yerleşim Planı Görseli')
                                    ->image()
                                    ->required()
                                    ->maxSize(150000)
                                    ->disk('public')
                                    ->directory('global/mahal-list')
                                    ->optimize('webp')
                                    ->deletable(true)
                                    ->acceptedFileTypes(['image/*'])
                                    ->columnSpan(6),

                                TextInput::make('planTitle')
                                    ->label('Yerleşim Planı Başlığı')
                                    ->default('Yerleşim')
                                    ->columnSpan(6),

                                TextInput::make('planSubtitle')
                                    ->label('Yerleşim Planı Alt Başlığı')
                                    ->default('Yerleşim planını görüntüleyin.')
                                    ->columnSpan(6),
                            ])
                            ->columns(6),

                        Tabs\Tab::make('Mahal Listesi')
                            ->schema([
                                FileUpload::make('mahalImage')
                                    ->label('Mahal Listesi Görseli')
                                    ->image()
                                    ->required()
                                    ->maxSize(150000)
                                    ->disk('public')
                                    ->directory('global/mahal-list')
                                    ->optimize('webp')
                                    ->deletable(true)
                                    ->acceptedFileTypes(['image/*'])
                                    ->columnSpan(3),

                                FileUpload::make('mahalPdf')
                                    ->label('Mahal Listesi PDF')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->required()
                                    ->maxSize(10240)
                                    ->disk('public')
                                    ->directory('global/mahal-list')
                                    ->columnSpan(3),

                                TextInput::make('mahalTitle')
                                    ->label('Mahal Listesi Başlığı')
                                    ->default('Mahal')
                                    ->columnSpan(6),
                            ])
                            ->columns(6),

                        Tabs\Tab::make('Bölüm Ayarları')
                            ->schema([
                                TextInput::make('sectionClass')
                                    ->label('Ek CSS Sınıfları')
                                    ->placeholder('class1 class2')
                                    ->columnSpan(3),

                                TextInput::make('sectionStyle')
                                    ->label('Özel CSS Stilleri')
                                    ->placeholder('background-color: #fff;')
                                    ->columnSpan(3),
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
