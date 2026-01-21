<?php

namespace App\Models;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Model;

class Role extends SpatieRole
{
    protected $fillable =[
        "name",
        
    ];
}
