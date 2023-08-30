<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
