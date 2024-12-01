<?php

namespace App\Filament\Resources;

use Z3d0X\FilamentFabricator\Resources\PageResource as BasePageResource;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;

class PageResource extends BasePageResource
{
    public static function table(Table $table): Table
    {
        return parent::table($table)
            ->actions([
                ViewAction::make()
                    ->visible(config('filament-fabricator.enable-view-page')),
                EditAction::make(),
                Action::make('duplicate')
                    ->label('Kopyala')
                    ->icon('heroicon-o-document-duplicate')
                    ->color('warning')
                    ->action(function (PageContract $record) {
                        $clone = $record->replicate();
                        $clone->title = $clone->title . ' (Kopya)';
                        $clone->slug = Str::slug($clone->title);
                        $clone->save();
                    }),
                Action::make('visit')
                    ->label(__('filament-fabricator::page-resource.actions.visit'))
                    ->url(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id, true) ?: null)
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->openUrlInNewTab()
                    ->color('success')
                    ->visible(config('filament-fabricator.routing.enabled')),
            ]);
    }
} 