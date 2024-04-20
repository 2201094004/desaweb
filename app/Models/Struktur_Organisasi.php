<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur_Organisasi extends Model
{
    use HasFactory;
    protected $table = 'struktur__organisasis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
        ]; 

    protected $fillable = [
        'nama_organisasi',
        'jabatan',
        'nama_pengurus',
        'foto_pengurus',
    ];
}
