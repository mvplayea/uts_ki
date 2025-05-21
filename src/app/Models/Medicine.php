<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'type', 'dosage', 'description'];

    public function medicalRecords()
    {
        return $this->belongsToMany(MedicalRecord::class)
                    ->withPivot('dosage')
                    ->withTimestamps();
    }
}
