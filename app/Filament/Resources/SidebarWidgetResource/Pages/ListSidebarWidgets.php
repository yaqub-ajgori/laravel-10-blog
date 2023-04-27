<?php

namespace App\Filament\Resources\SidebarWidgetResource\Pages;

use App\Filament\Resources\SidebarWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSidebarWidgets extends ListRecords
{
    protected static string $resource = SidebarWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
