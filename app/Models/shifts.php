<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_name',
        'email',
        'role',
        'phone',
        'password',
    ];

    public function staffcertificates()
    {
        return $this->hasMany(StaffCertificate::class);
    }
}
