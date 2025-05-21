<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['full_name', 'specialty', 'phone', 'email'];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
