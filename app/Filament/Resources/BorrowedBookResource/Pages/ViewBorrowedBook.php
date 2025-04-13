<?php

namespace App\Filament\Resources\BorrowedBookResource\Pages;

use App\Filament\Resources\BorrowedBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBorrowedBook extends ViewRecord
{
    protected static string $resource = BorrowedBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
