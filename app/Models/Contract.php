<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $filable =[
        "company_id",
        "property_id",
        "start_date",
        "end_date",
        "pdf_file",
        "signed",
        "amount",
        "status"
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
