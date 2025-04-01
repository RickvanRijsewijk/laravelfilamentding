<?php

namespace App\Filament\Resources\EmailResource\Pages;

use App\Filament\Resources\EmailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmail extends CreateRecord
{
    protected static string $resource = EmailResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Email Created';
    }
}
