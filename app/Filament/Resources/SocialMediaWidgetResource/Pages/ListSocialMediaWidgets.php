<?php

namespace App\Filament\Resources\SocialMediaWidgetResource\Pages;

use App\Filament\Resources\SocialMediaWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialMediaWidgets extends ListRecords
{
    protected static string $resource = SocialMediaWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
