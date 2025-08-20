<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MenuType extends Model
{
    //
    use HasFactory;

     protected $fillable = [
        'menutypename',
        'created_at',
        'updated_at',
    ];

    public function menus() {
        return $this->hasMany(Menu::class, 'menutypeid');
    }
}
