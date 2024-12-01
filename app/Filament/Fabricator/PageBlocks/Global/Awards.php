<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Awards extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.awards')
            ->schema([
                Tabs::make('Düzenleyici')
                    ->tabs([
                        Tabs\Tab::make('İçerik')
                            ->schema([
                                Select::make('headingType')
                                    ->label('Başlık Tipi')
                                    ->options([
                                        'h1' => 'H1',
                                        'h2' => 'H2',
                                        'h3' => 'H3',
                                        'div' => 'Normal'
                                    ])
                                    ->default('h2')
                                    ->columnSpan(2),

                                TextInput::make('title')
                                    ->label('Ana Başlık')
                                    ->default('Ödüllerimiz')
                                    ->columnSpan(4),

                                Repeater::make('awards')
                                    ->label('Ödüller')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Ödül Logosu')
                                            ->image()
                                            ->disk('public')
                                            ->directory('global/awards')
                                            ->optimize('webp')
                                            ->deletable(true)
                                            ->acceptedFileTypes(['image/*'])
                                            ->columnSpan(6),

                                        TextInput::make('title')
                                            ->label('Ödül Başlığı')
                                            ->required()
                                            ->columnSpan(6),

                                        TextInput::make('description')
                                            ->label('Ödül Açıklaması')
                                            ->required()
                                            ->columnSpan(6),
                                    ])
                                    ->collapsible()
                                    ->collapsed()
                                    ->columns(6)
                                    ->defaultItems(1)
                                    ->columnSpanFull(),
                            ])
                            ->columns(6),

                        Tabs\Tab::make('Bölüm Ayarları')
                            ->schema([
                                TextInput::make('sectionId')
                                    ->label('Section ID')
                                    ->default('odullerimiz')
                                    ->columnSpan(2),

                                TextInput::make('sectionClass')
                                    ->label('Ek CSS Sınıfları')
                                    ->placeholder('class1 class2')
                                    ->columnSpan(2),

                                TextInput::make('sectionStyle')
                                    ->label('Özel CSS Stilleri')
                                    ->placeholder('background-color: #fff;')
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
