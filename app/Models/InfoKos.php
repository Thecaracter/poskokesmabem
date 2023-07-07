<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKos extends Model
{
    use HasFactory;
    protected $table = 'infokos';


    protected $fillable = [
        'link_kos_jbr',
        'link_kos_bws',
        'link_tanggapan',
        'nama_cp',
        'link_contact',
        'link_kebijakankampus'
    ];
}