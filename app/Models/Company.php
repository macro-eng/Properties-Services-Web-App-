<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=[
        "user_id",
        "name",
        "status",
        "services",
    ];
    protected $casts =[
        "services"=>"array",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }   
    public function serviceList(){
        return $this->hasMany(Service::class);
    }
}
