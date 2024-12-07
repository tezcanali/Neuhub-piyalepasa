<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Breadcrumb extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.breadcrumb')
            ->schema([
                Repeater::make('breadcrumbs')
                ->label('Breadcrumb')
                ->schema([
                    TextInput::make('title')
                    ->label('Başlık'),
                    TextInput::make('url')
                    ->label('URL'),
                ])
                ->collapsible()
                ->collapsed(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
