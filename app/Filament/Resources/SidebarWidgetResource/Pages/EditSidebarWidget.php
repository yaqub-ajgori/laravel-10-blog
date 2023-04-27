<?php

namespace App\Filament\Resources\SidebarWidgetResource\Pages;

use App\Filament\Resources\SidebarWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSidebarWidget extends EditRecord
{
    protected static string $resource = SidebarWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
