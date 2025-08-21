<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customers;       // make sure this import exists
use App\Models\InvoiceDetail;   // make sure this import exists

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $primaryKey = 'invoiceid'; // your custom primary key
    public $incrementing = true;         // true if auto-increment
    protected $keyType = 'int';          // 'int' or 'string'

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
        return $this->belongsTo(Customers::class, 'customerid', 'customerid');
    }

    // An invoice has many details (line items)
    public function details()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoiceid', 'invoiceid');
    }
}
