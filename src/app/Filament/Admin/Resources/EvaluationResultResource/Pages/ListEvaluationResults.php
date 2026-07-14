<?php

namespace App\Filament\Admin\Resources\EvaluationResultResource\Pages;

use App\Filament\Admin\Resources\EvaluationResultResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvaluationResults extends ListRecords
{
    protected static string $resource = EvaluationResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
