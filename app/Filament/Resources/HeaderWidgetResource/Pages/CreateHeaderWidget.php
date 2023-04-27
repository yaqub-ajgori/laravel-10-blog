<?php

namespace App\Filament\Resources\HeaderWidgetResource\Pages;

use App\Filament\Resources\HeaderWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeaderWidget extends CreateRecord
{
    protected static string $resource = HeaderWidgetResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
