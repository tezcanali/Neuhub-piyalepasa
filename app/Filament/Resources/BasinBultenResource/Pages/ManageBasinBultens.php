<?php

namespace App\Filament\Resources\BasinBultenResource\Pages;

use App\Filament\Resources\BasinBultenResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBasinBultens extends ManageRecords
{
    protected static string $resource = BasinBultenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
