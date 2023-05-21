<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'work_experience_id';
    public $incrementing = true;
    protected $keyType = 'int';    
}
