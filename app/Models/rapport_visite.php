<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapport_visite extends Model
{
    use HasFactory;
    protected $table = 'rapport_visite';
    // Two Primary key
    protected $primaryKey = 'RAP_NUM';
    // No timestamps
    public $timestamps = false;
    
    
}
