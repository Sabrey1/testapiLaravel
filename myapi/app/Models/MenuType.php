<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    use HasFactory;

    protected $table = 'menu_types';
    protected $primaryKey = 'menutypeid';  // <-- your primary key column
    public $incrementing = true;           // true if auto-increment
    protected $keyType = 'int';            // 'int' or 'string'

    protected $fillable = [
        'name', 'description', 'created_at', 'updated_at'
    ];

    // Example relation to Menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'menutypeid', 'menutypeid');
    }
}
