<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';

    protected $fillable = ['nama_mitra', 'nama_cp', 'link_mitra', 'link_contact'];

}