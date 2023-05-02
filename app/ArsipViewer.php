<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArsipViewer extends Model
{
    protected $table = 'tbl_arsip_viewers';
    protected $fillable = [
        'arsip_id',
        'viewers',
        'date'
    ];
}
