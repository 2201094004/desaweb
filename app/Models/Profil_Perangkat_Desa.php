<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_Perangkat_Desa extends Model
{
    use HasFactory;
    protected $table = 'profil__perangkat__desas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
        ]; 

    protected $fillable = [
        'nama_perangkat',
        'jabatan',
        'foto_perangkat',
        'deskripsi',
    ];
}
