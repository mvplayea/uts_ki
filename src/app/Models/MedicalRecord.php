<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = ['visit_id', 'diagnosis', 'notes'];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)
                    ->withPivot('dosage')
                    ->withTimestamps();
    }
}
