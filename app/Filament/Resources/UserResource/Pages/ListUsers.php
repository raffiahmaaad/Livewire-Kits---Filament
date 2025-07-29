<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab; // Pastikan ini di-import
use App\Filament\Resources\UserResource\Tabs; // Dan ini juga

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            Tab::make('All Users'), // Tab 'all' tetap di sini
            new Tabs\Customers(),
            new Tabs\Admins(),
        ];
    }
}
