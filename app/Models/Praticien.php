<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praticien extends Model
{
    use HasFactory;
    protected $primaryKey = 'PRA_NUM';
    public $timestamps = false;


}
