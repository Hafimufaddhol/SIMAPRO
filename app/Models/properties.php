<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    use HasFactory;

    protected $table = 'properties';
    protected $primaryKey = 'id_properti';

    protected $fillable = [
        'id_user',
        'nama_properti',
        'deskripsi',
        'harga',
        'tipe_properti',
        'alamat',
        'status_ketersediaan',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
