<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class DairePlan extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.daire-plan')
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
                                        'h4' => 'H4',
                                        'div' => 'Normal'
                                    ])
                                    ->default('h2')
                                    ->columnSpan(2),

                                TextInput::make('title')
                                    ->label('Ana Başlık')
                                    ->default('Daire Planları')
                                    ->columnSpan(4),

                                Repeater::make('planCategories')
                                    ->label('Plan Kategorileri')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Kategori Adı')
                                            ->required()
                                            ->columnSpan(6),

                                        Repeater::make('plans')
                                            ->label('Planlar')
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label('Plan Adı')
                                                    ->required()
                                                    ->columnSpan(6),

                                                FileUpload::make('image')
                                                    ->label('Plan Görseli')
                                                    ->image()
                                                    ->required()
                                                    ->maxSize(150000)
                                                    ->disk('public')
                                                    ->directory('global/plans')
                                                    ->optimize('webp')
                                                    ->deletable(true)
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->columnSpan(6),
                                            ])
                                            ->collapsible()
                                            ->collapsed()
                                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                                            ->columnSpanFull()
                                            ->columns(6)
                                            ->defaultItems(1),
                                    ])
                                    ->collapsible()
                                    ->collapsed()
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                                    ->columns(6)
                                    ->columnSpanFull()
                                    ->defaultItems(3),
                            ])
                            ->columns(6),

                        Tabs\Tab::make('Bölüm Ayarları')
                            ->schema([
                                TextInput::make('sectionId')
                                    ->label('Section ID')
                                    ->default('plans')
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
