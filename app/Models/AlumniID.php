<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniID extends Model
{
    use HasFactory;
    protected $table = 'alumni_id';
    protected $primaryKey = 'id';
    protected $fillable = [
        'a_no',
        'id_no',
        'name',
        'address',
        'bday',
        'course',
        'signature',
    ];

}
