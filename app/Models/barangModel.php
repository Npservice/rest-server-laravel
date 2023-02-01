<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'kd_barang';
    // protected $incrementing = true;
    protected $fillable = ['jenis_barang', 'nm_barang', 'jml_barang', 'warna', 'ukuran', 'harga', 'ket_barang'];
    public $timestamps = false;
}
