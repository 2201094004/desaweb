<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi_Misi extends Model
{
    use HasFactory;
    protected $table = 'visi__misis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
        ]; 

    protected $fillable = [
        'judul',
        'deskripsi',
    ];
}
