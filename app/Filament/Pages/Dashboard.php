<?php
 namespace App\Filament\Pages;
 use Filament\Pages\Dashboard as BaseDashboard;
 use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
 use Filament\Pages\Dashboard\Actions\FilterAction;
 use Filament\Forms\Form;
 use Filament\Forms\Components\Section;
 use Filament\Forms\Components\Select;
 use Filament\Forms\Components\DatePicker;

 class dashboard extends BaseDashboard
 {
    use HasFiltersForm;
    // protected array $columnSpan =[
    //     'md'=>3,
    // ];
    protected static ?string $navigationLabel="الرئيسية";
    public function getHeaderActions():array{
        return [
            FilterAction::make()
            ->form([
                Select::make("type")
                ->options([
                    "apartment"=>"شقق",
                    "villa"=>"فلل",
                    "building"=>"مباني",
                    "room"=>"الغرف",

                ])
                ->native(false)
                ->label("نوع العقار"),
                DatePicker::make("startDate")
                ->label("من تاريخ")
                ->native(false),
                DatePicker::make("endDate")
                ->label("الى تاريخ"),
            ]),
       
           
        
        ];
    }

    // public function filtersForm(Form $form):Form{
    //     return 
        
        
    // }

 }

