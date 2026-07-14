<?php

namespace App\Filament\Admin\Resources\PhishingSubmissionResource\Pages;

use App\Filament\Admin\Resources\PhishingSubmissionResource;
use Filament\Resources\Pages\ListRecords;

class ListPhishingSubmissions extends ListRecords
{
    protected static string $resource = PhishingSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}