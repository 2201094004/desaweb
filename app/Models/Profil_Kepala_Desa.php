<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_Kepala_Desa extends Model
{
    use HasFactory;
    protected $table = 'profil__kepala__desas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
        ]; 

    protected $fillable = [
        'nama_kepala_desa',
        'foto_kepala_desa',
        'deskripsi',
    ];
}
