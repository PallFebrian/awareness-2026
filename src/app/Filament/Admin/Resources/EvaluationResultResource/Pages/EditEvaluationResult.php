<?php

namespace App\Filament\Admin\Resources\EvaluationResultResource\Pages;

use App\Filament\Admin\Resources\EvaluationResultResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvaluationResult extends EditRecord
{
    protected static string $resource = EvaluationResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
