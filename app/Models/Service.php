<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[
        "name",
        "price",
        "description",
        "frequency",
        "company_id"
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
