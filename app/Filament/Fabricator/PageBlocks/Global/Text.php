<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Text extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.text')
            ->schema([
                RichEditor::make('content')
                ->label('İçerik'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
