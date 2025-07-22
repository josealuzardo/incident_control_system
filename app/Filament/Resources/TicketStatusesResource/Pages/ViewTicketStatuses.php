<?php

namespace App\Filament\Resources\TicketStatusesResource\Pages;

use App\Filament\Resources\TicketStatusesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTicketStatuses extends ViewRecord
{
    protected static string $resource = TicketStatusesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
