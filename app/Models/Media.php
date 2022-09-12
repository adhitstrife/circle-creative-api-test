<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'mediables';
    protected $fillable = ['file', 'type', 'mediable_id', 'mediable_type'];

    public function mediable() {
        return $this->morphTo();
    }
}
