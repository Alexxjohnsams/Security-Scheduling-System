<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'officer_name',
        'location',
        'date',
    ];

    public function shifts()
    {
        return $this->belongsTo(users::class);
    }
}
