<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customername',
        'companyname',
        'phone',
        'email',
        'address',
        'ishidden',
        'isdefault',
        'created_at',
        'updated_at',
    ];
     public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customerid');
    }
}