<?php

namespace App\Filament\Resources\SidebarWidgetResource\Pages;

use App\Filament\Resources\SidebarWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSidebarWidget extends CreateRecord
{
    protected static string $resource = SidebarWidgetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
