<?php

namespace App\Filament\Resources\SocialMediaWidgetResource\Pages;

use App\Filament\Resources\SocialMediaWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialMediaWidget extends CreateRecord
{
    protected static string $resource = SocialMediaWidgetResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
