<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // one to many
    
    public function visiteur()
    {
        return $this->belongsTo(visiteur::class);
    }
}
