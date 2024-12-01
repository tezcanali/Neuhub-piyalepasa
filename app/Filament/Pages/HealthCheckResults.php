<?php

namespace App\Filament\Pages;

use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults as BaseHealthCheckResults;

class HealthCheckResults extends BaseHealthCheckResults
{
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?int $navigationSort = 4;

    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Uygulama Sağlığı';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Sistem';
    }
}
