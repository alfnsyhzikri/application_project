<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasIpa extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'nisn',
        'nm_siswa',
    ];

    // protected $table = 'kelas_ipa';
}
