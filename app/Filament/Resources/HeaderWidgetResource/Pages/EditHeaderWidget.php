<?php

namespace App\Filament\Resources\HeaderWidgetResource\Pages;

use App\Filament\Resources\HeaderWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeaderWidget extends EditRecord
{
    protected static string $resource = HeaderWidgetResource::class;

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
