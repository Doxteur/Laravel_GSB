<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visiteur extends Model
{
    use HasFactory;
    protected $table = 'visiteur';
    protected $primaryKey = 'VIS_MATRICULE';
    public $incrementing = false;
    public $timestamps = false;


}
