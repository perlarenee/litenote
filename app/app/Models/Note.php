<?php

namespace App\Models;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'uuid';
    }

    //defining a note has one user, defining relationship
    public function user(){
        return $this->belongsTo(User::class);
    }

    //note belongs to a single notebook, relationshiup
    public function notebook(){
        return $this->belongsTo(Notebook::class);
    }

}
