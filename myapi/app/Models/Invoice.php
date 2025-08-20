<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'ishidden',
        'customerid',
        'orderdate',
        'vat',
        'memo',
        'ispaid',
        'created_at',
        'updated_at',
    ];
    

    // An invoice belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid');
    }

    // An invoice has many details (line items)
    public function details()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoiceid');
    }
}
