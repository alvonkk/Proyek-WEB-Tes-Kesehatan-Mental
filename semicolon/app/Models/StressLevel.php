<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StressLevel extends Model
{
    use HasFactory;

    protected $table = 'stress_level';
    protected $fillable = ['aspek_penilaian_id', 'user_id', 'jawaban'];
}
