<?php

// app/Models/SellerRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'id_user', 'tanggal_pengajuan', 'status_pengajuan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

