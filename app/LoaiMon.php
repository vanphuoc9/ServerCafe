<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMon extends Model
{
    //
    protected $table = "loaimon";

    protected $primaryKey = "MALOAI";
    
    public $timestamps = false;
}
