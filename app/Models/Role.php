<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// In Role.php
class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
