<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'about_id';
    public $incrementing = true;
    protected $keyType = 'int';
}
