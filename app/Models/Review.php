<?php

// app/Models/Review.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_review';

    protected $fillable = [
        'id_user', 'id_properti', 'rating', 'komentar', 'tanggal_review'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'id_properti');
    }
}

