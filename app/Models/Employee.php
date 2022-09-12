<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'birth_place', 'birth_date', 'phone_number', 'department_id', 'position_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function media() {
        return $this->morphMany(Media::class, 'mediable');
    }
}
