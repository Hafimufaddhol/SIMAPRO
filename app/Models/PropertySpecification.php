<?php

// app/Models/PropertySpecification.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySpecification extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_specification';

    protected $fillable = [
        'id_properti', 'luas', 'jumlah_kamar', 'jumlah_ruangan', 'jumlah_kamar_mandi', 'jumlah_lantai', 'fasilitas', 'tipe_fasilitas'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'id_properti');
    }
}

