<?php

namespace App\Filament\Fabricator\PageBlocks\Contact;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HowGo extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('contact.how-go')
            ->schema([
                //
            ])->visible(fn ($get) => $get('../layout') == 'contact');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
