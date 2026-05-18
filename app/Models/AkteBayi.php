<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkteBayi extends Model
{
    protected $fillable = [
        'nama',
        'nama_ibu',
        'tanggal_daftar',
        'bulan',
        'tahun',
        'file',
        'kota_id',
    ];

    protected $casts = [
        'file' => 'array',
        'tanggal_daftar' => 'date',
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
