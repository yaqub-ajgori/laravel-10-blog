<?php

namespace App\Filament\Resources\AbouResource\Pages;

use App\Filament\Resources\AbouResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbou extends EditRecord
{
    protected static string $resource = AbouResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
