<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
