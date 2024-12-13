<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Define relationship with permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
