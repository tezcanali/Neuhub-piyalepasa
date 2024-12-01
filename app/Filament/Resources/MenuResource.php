<?php

namespace App\Filament\Resources;

use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;

class MenuResource extends BaseMenuResource
{
    protected static ?string $navigationLabel = 'Menu';
    protected static ?string $navigationParentItem = 'Genel Ayarlar';
    protected static ?string $navigationGroup = 'Sistem';
} 