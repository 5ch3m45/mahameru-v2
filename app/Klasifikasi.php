<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Klasifikasi extends Model
{
    protected $table = 'tbl_klasifikasi';
    protected $fillable = ['kode', 'nama', 'deskripsi'];

    public function arsips()
    {
        return $this->hasMany(Arsip::class);
    }

    public function getShortNamaAttribute()
    {
        return Str::length($this->nama) > 20 ? Str::substr($this->nama, 0, 20).'...' : $this->nama;
    }
}
