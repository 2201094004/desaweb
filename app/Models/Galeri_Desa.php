<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri_Desa extends Model
{
    use HasFactory;
    protected $table = 'galeri__desas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
        ]; 

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
    ];
}
