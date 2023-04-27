<?php

namespace App\Filament\Resources\HeaderWidgetResource\Pages;

use App\Filament\Resources\HeaderWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeaderWidgets extends ListRecords
{
    protected static string $resource = HeaderWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
