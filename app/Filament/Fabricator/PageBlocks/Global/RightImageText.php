<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class RightImageText extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.right-image-text')
            ->schema([
                Select::make('imagePosition')
                    ->label('Görsel Pozisyonu')
                    ->options([
                        'right' => 'Sağda',
                        'left' => 'Solda'
                    ])
                    ->default('right')
                    ->columnSpan(3),

                TextInput::make('section_id')
                    ->label('Section ID')
                    ->columnSpan(3),

                FileUpload::make('image')
                    ->label('Görsel')
                    ->image()
                    ->maxSize(150000)
                    ->disk('public')
                    ->directory('global/right-image-text')
                    ->optimize('webp')
                    ->deletable(true)
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpan(6),

                Select::make('heading_type')
                    ->label('Başlık Tipi')
                    ->options([
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'div' => 'Normal'
                    ])
                    ->default('h1')
                    ->columnSpan(1),

                TextInput::make('title')
                    ->label('Ana Başlık')
                    ->columnSpan(5),

                TextInput::make('highlight_text1')
                    ->label('Vurgulanan Metin 1')
                    ->columnSpan(6),

                TextInput::make('suntitle')
                    ->label('Alt Başlık')
                    ->columnSpan(6),

                TextInput::make('button')
                    ->label('Buton')
                    ->columnSpan(3),

                TextInput::make('button_url')
                    ->label('Buton Link')
                    ->columnSpan(3),

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

                Repeater::make('links')
                    ->label('Görsel Butonlar')
                    ->schema([
                        TextInput::make('text')
                            ->label('Bağlantı Metni'),

                        TextInput::make('url')
                            ->label('Bağlantı URL')
                            ->url(),
                    ])
                    ->collapsible()
                    ->collapsed()
                    ->defaultItems(0)
                    ->columnSpan(6),
            ])->columns(6);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
