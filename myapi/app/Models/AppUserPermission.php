<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AppUserPermission extends Model
{
    //
    use HasFactory;

     protected $fillable = [
        'appuserid',
        'userpermission',
        'created_at',
        'updated_at',
    ];

     public function user() {
        return $this->belongsTo(AppUser::class, 'appuserid');
    }
}
