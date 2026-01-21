<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Table\Columns\IconColumn;
use Filament\Tables\Table\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestProperties extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                // ...
            )
            ->columns([
                TextColumn::make("name"),
                TextColumn::make("status"),

            ]);
    }
}
