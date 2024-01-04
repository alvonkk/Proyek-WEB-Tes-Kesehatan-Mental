<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
    use HasFactory;

    protected $table = 'counseling';
    protected $fillable = ['user_id', 'tanggal', 'selesai', 'deskripsi', 'status'];

    // Define the relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
