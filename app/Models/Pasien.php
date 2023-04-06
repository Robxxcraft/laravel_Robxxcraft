<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    
    protected $table = 'pasien';

    protected $fillable = [
        'nama_pasien',
        'alamat',
        'no_telepon',
        'id_rumah_sakit',
    ];

    public function rumah_sakit()
    {
        return $this->hasOne(RumahSakit::class, 'id', 'id_rumah_sakit');
    }
}
