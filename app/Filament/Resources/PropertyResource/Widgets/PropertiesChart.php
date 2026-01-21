<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Carbon;
use App\Models\Property;
class PropertiesChart extends ChartWidget
{   use InteractsWithPageFilters;
    protected static ?string $heading = 'العقارات المدخلة شهريا';
        // protected  int | array |string $columnSpan ='full';

    protected function getData(): array
    {
        $start = $this->filters["startDate"] ?? now()->subDays(30);
        $type = $this->filters["type"] ?? null ;
        $end = $this->filters["endDate"] ?? now();
        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);
           $data = Trend::query(Property::where('type','=','apartment'))
            ->between(
                   start:$startDate ?? now()->subDays(7),
                   end:$endDate ?? now()
            )
            ->perMonth()
            ->count();
        if($type){
   $data = Trend::query(Property::where('type','=',$type))
            ->between(
                   start:$startDate ?? now()->subDays(7),
                   end:$endDate ?? now()
            )
            ->perMonth()
            ->count();        }
     
        return [
            'datasets'=>[
                [
                'label'=>"مخطط البياني للعقارات",
                'data'=>$data->map(fn(TrendValue $value)=>$value->aggregate),
                'backgroundColor'=>"#3b82f6",
                ],
            ],
            'labels'
                =>$data->map(fn(TrendValue $value)=>$value->date)
            

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
