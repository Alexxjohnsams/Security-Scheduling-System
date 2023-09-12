<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class shifts extends Model
{
    use HasFactory;

    protected $table = 'shifts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'officer_name',
        'location',
        'date',
        'formated_date',
        'shift_status'
    ];

    
    public function shifts()
    {
        return $this->hasMany(User::class);
    }
}
