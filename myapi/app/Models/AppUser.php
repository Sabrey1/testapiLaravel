<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AppUser extends Model
{
    //
    use HasFactory;

     protected $fillable = [
        'ishidden',
        'username',
        'password',
    ];

    // Hide sensitive fields
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts
    protected $casts = [
        'ishidden' => 'boolean',
    ];

      public function permissions() {
        return $this->hasMany(AppUserPermission::class, 'appuserid');
    }
}
