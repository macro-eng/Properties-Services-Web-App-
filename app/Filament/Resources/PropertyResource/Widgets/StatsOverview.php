<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Property;
class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;
    // protected ?string $heading='اضافة شقة جديدة';

    protected function getStats(): array
    {
         $startDate = $this->filters['startDate'] ?? null;
         $endDate = $this->filters['endDate'] ?? null;
         $type = $this->filters['type'] ?? null;
        return [
           Stat::make(
            label:'كل العقارات',
            value:Property::query()
            ->when($startDate,fn(Builder $q)=>$q->whereDate('created_at','>=',$startDate))
            ->when($endDate,fn(Builder $q2)=>$q2->whereDate("created_at",'<=',$endDate))
            ->count(),
           ),
            Stat::make(
            label:'الشقق',
            value:Property::query()
            ->when($startDate,fn(Builder $q)=>$q->where('type','=','apartment'))
            ->count(),
           ),
              Stat::make(
            label:'الحجوزات',
            value:'0'
            // Property::query()
            // ->when($startDate,fn(Builder $q)=>$q->where('type','=','apartment'))
            // ->count(),
           ),
        ];
    }
}
