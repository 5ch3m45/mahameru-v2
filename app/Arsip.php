<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Arsip extends Model
{
    protected $table = 'tbl_arsip';
    
    protected $fillable = [
        'nomor',
        'informasi',
        'keterangan_fisik',
        'pencipta',
        'level',
        'tanggal',
        'admin_id',
        'klasifikasi_id',
        'status',
        'viewers',
        'last_viewer_update'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function lampirans()
    {
        return $this->hasMany(Lampiran::class);
    }

    public function getShortInformasiAttribute()
    {
        return Str::length($this->informasi) > 50 ? Str::substr($this->informasi, 0, 50).'...' : $this->informasi;
    }

    public function getLevelBadgeAttribute()
    {
        if ($this->level == 1) {
            return '<small class="badge bg-danger">Rahasia</small>';
        }
        return '<small class="badge bg-success">Publik</small>';
    }

    public function getLampiranCountAttribute()
    {
        return $this->lampirans->count();
    }

    public function getTanggalFormattedAttribute()
    {
        return date('d M Y', strtotime($this->tanggal));
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status == 1) {
            return '<small class="badge bg-warning">Draft</small>';
        }
        if ($this->status == 2) {
            return '<small class="badge bg-success">Terpublikasi</small>';
        }
        return '<small class="badge bg-danger text-light">Dihapus</small>';
    }
}
