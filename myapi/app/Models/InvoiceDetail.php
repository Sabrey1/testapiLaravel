<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class InvoiceDetail extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'invoiceid',
        'menuid',
        'orderquantity',
        'orderprice',
        'discount',
        'created_at',
        'updated_at',
    ];
    

    // A detail belongs to an invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoiceid');
    }

    // A detail belongs to a menu item
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menuid');
    }
}
