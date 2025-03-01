<?php

namespace App\Models;

use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notebook extends Model
{
    use HasFactory;
    protected $guarded = []; //set to not guarded forms

    public function getRouteKeyName(){
        return 'uuid';
    }

    //defining a notebook has many notes. many to one
    public function notes(){
        return $this->hasMany(Note::class);
    }
}
