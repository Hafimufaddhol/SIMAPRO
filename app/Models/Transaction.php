<?php

// app/Models/Transaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_user', 'id_properti', 'tipe_transaksi', 'tanggal_transaksi', 'jumlah', 'status_transaksi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'id_properti');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_transaksi');
    }
}

