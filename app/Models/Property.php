<?php

// app/Models/Property.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_properti';

    protected $fillable = [
        'id_user', 'nama_properti', 'deskripsi', 'harga', 'tipe_properti', 'alamat', 'status_ketersediaan', 'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_properti');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_properti');
    }

    public function specification()
    {
        return $this->hasOne(PropertySpecification::class, 'id_properti');
    }
}
