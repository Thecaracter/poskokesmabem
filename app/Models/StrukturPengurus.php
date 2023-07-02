<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturPengurus extends Model
{
    use HasFactory;
    protected $table = 'struktur_pengurus';

    protected $fillable = ['nama', 'jabatan', 'motto', 'foto'];

}