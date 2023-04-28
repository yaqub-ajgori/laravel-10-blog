<?php

namespace App\Filament\Resources\AbouResource\Pages;

use App\Filament\Resources\AbouResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbous extends ListRecords
{
    protected static string $resource = AbouResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
