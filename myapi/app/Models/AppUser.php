<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AppUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'app_users';
    protected $primaryKey = 'appuserid';  // <-- your actual primary key
    public $incrementing = true;           // true if auto-increment
    protected $keyType = 'int';            // type of primary key

    protected $fillable = [
        'name', 'email', 'password', 'created_at', 'updated_at'
    ];

    // Example relation to permissions
    public function permissions()
    {
        return $this->hasMany(AppUserPermission::class, 'appuserid', 'appuserid');
    }
}
