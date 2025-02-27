<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notebook extends Model
{
    use HasFactory;
    protected $guarded = []; //set to not guarded forms

    public function getRouteKeyName(){
        return 'uuid';
    }
}
