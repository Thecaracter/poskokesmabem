<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKos extends Model
{
    use HasFactory;
    protected $table = 'infokos';

    protected $fillable = ['nama_kos', 'nama_cp', 'link_kos', 'link_contact'];

}