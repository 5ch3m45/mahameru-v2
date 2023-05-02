<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'tbl_aduan';
    protected $fillable = ['kode', 'nama', 'email', 'aduan', 'status'];

    public function timeline()
    {
        return $this->hasMany(AduanTimeline::class);
    }

    public function getStatusBadgeAttribute()
    {
        switch ((int)$this->status) {
            case 1:
                $badge = '<span class="badge fw-0 bg-danger text-white">Diterima</span>';
                break;

            case 2:
                $badge = '<span class="badge fw-0 bg-warning text-white">Dibaca</span>';
                break;

            case 3:
                $badge = '<span class="badge fw-0 bg-success text-white">Ditindaklanjuti</span>';
                break;

            case 4:
                $badge = '<span class="badge fw-0 bg-primary text-white">Selesai</span>';
                break;
            
            default:
                $badge = '<span class="badge fw-0 bg-dark text-white">-</span>';
                break;
        }

        return $badge;
    }
}
