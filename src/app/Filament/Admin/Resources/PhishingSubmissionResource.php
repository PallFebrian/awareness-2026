<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PhishingSubmissionResource\Pages;
use App\Models\PhishingSubmission;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PhishingSubmissionResource extends Resource
{
    protected static ?string $model = PhishingSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';

    protected static ?string $navigationGroup = 'Security Awareness';

    protected static ?string $navigationLabel = 'Submission Simulasi';

    protected static ?string $modelLabel = 'Submission Simulasi';

    protected static ?string $pluralModelLabel = 'Submission Simulasi';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('participant_code')
                    ->label('Kode Peserta')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('simulated_email')
                    ->label('Email Simulasi')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('password_masked')
                    ->label('Password Tersamarkan')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('password_length')
                    ->label('Panjang')
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('format_valid')
                    ->label('Valid')
                    ->boolean()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('submitted_at')
                    ->label('Waktu Submit')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('submitted_at', 'desc')
            ->actions([])
            ->bulkActions([]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhishingSubmissions::route('/'),
        ];
    }
}