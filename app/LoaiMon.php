<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMon extends Model
{
    //
    protected $table = "loaisanpham";

    protected $primaryKey = "MALOAISP";
    
    public $timestamps = false;
}
