<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offrir extends Model
{
    use HasFactory;
    protected $table = 'offrir';
    protected $primaryKey = 'RAP_NUM';
    //No time stamp
    public $timestamps = false;
    
}
