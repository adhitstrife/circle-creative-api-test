<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['position_name'];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function media() {
        return $this->morphMany(Media::class, 'mediable');
    }
}
