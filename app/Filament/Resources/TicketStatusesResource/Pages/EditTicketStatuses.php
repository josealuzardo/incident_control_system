<?php

namespace App\Filament\Resources\TicketStatusesResource\Pages;

use App\Filament\Resources\TicketStatusesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTicketStatuses extends EditRecord
{
    protected static string $resource = TicketStatusesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
