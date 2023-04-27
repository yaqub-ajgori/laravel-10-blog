<?php

namespace App\Filament\Resources\SocialMediaWidgetResource\Pages;

use App\Filament\Resources\SocialMediaWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialMediaWidget extends EditRecord
{
    protected static string $resource = SocialMediaWidgetResource::class;

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
