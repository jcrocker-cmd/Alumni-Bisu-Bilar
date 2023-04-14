<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        'user_id',
        'signature',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
