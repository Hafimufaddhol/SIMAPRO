<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id',
        'id_user'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
