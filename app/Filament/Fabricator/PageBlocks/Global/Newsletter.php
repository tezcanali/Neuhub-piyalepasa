<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use App\Models\BasinBulten;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Newsletter extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.newsletter')
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
                Select::make('language')
                    ->label('Dil')
                    ->options([
                        'tr' => 'Turkish',
                        'en' => 'English',
                    ])
                    ->columnSpan(3),
                Select::make('sort')
                    ->label('Sırala')
                    ->options([
                        'new' => 'Yeniden Eskiye',
                        'old' => 'Eskiden Yeniye',
                    ])
                    ->columnSpan(3),
            ])->columns(6);
    }

    public static function mutateData(array $data): array
    {
        $page = request()->get('page', 1);
        $query = BasinBulten::query();

        if (isset($data['sort'])) {
            $query->orderBy('created_at', $data['sort'] === 'new' ? 'desc' : 'asc');
        }

        $data['newsletter'] = $query->paginate(30);

        return $data;
    }
}