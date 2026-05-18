<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function akteBayis()
    {
        return $this->hasMany(AkteBayi::class);
    }
}
