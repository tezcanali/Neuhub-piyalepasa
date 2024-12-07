<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CardInfo extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.card-info')
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
                                        'h6' => 'H6',
                                        'div' => 'Normal'
                                    ])
                                    ->default('h6')
                                    ->columnSpan(1),

                                TextInput::make('title')
                                    ->label('Ana Başlık')
                                    ->columnSpan(5),

                                TextInput::make('highlightText')
                                    ->label('Vurgulanan Metin')
                                    ->columnSpan(6),
                                Repeater::make('columns')
                                    ->label('Kolonlar')
                                    ->schema([
                                        Select::make('width')
                                            ->label('Kolon Genişliği')
                                            ->options([
                                                'col-2' => '2/8',
                                                'col-3' => '3/8',
                                                'col-4' => '4/8',
                                                'col-6' => '6/8',
                                                'col-8' => '8/8',
                                            ])
                                            ->required()
                                            ->columnSpan(1),

                                        FileUpload::make('image')
                                            ->label('Görsel')
                                            ->image()
                                            ->disk('public')
                                            ->directory('global/card-info')
                                            ->optimize('webp')
                                            ->deletable(true)
                                            ->acceptedFileTypes(['image/*'])
                                            ->columnSpan(5),

                                        Select::make('headingType')
                                            ->label('Başlık Tipi')
                                            ->options([
                                                'h1' => 'H1',
                                                'h2' => 'H2',
                                                'h3' => 'H3',
                                                'h4' => 'H4',
                                                'div' => 'Normal'
                                            ])
                                            ->default('h4')
                                            ->columnSpan(1),

                                        TextInput::make('title')
                                            ->label('Başlık')
                                            ->columnSpan(5),

                                        TextInput::make('highlightText')
                                            ->label('Vurgulanan Metin')
                                            ->columnSpan(6),

                                        RichEditor::make('content')
                                            ->label('İçerik')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                            ])
                                            ->columnSpan(6),

                                        TextInput::make('buttonText')
                                            ->label('Buton Metni')
                                            ->columnSpan(3),

                                        TextInput::make('buttonUrl')
                                            ->label('Buton URL')
                                            ->url()
                                            ->columnSpan(3),
                                    ])
                                    ->collapsible()
                                    ->collapsed()
                                    ->columns(6)
                                    ->columnSpanFull()
                                    ->defaultItems(2),
                            ])
                            ->columns(6),

                        Tabs\Tab::make('Kart Ayarları')
                            ->schema([
                                TextInput::make('section_id')
                                    ->label('Section ID')
                                    ->columnSpan(6),

                                TextInput::make('cardPadding')
                                    ->label('Padding (örn: p-4 veya p-7)')
                                    ->placeholder('p-7')
                                    ->columnSpan(2),

                                TextInput::make('cardClass')
                                    ->label('Ek CSS Sınıfları')
                                    ->placeholder('class1 class2')
                                    ->columnSpan(2),

                                TextInput::make('cardStyle')
                                    ->label('Özel CSS Stilleri')
                                    ->placeholder('background-color: #fff;')
                                    ->columnSpan(2),
                                Textarea::make('style')
                                    ->label('Özel CSS Kodu')
                                    ->columnSpan(6)
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
