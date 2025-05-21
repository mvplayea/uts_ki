<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Patient extends Model
{
    use HasFactory;

    protected static function boot(){
        parent::boot();

        static::creating(function ($patient){
            if(empty($patient->token)){
                $patient->token = Str::random(5);
            }
        });
    }
    protected $fillable = ['full_name', 'gender', 'date_of_birth', 'phone', 'email', 'address'];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
};
