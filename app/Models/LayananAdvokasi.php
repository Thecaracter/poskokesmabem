<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananAdvokasi extends Model
{
    use HasFactory;
    protected $table = 'layanan_advokasi';

    protected $fillable = ['nama', 'email', 'kritik_saran'];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

}