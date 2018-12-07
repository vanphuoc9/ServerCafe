<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
        //
    protected $table = "loaisanpham";

    protected $primaryKey = "MALOAISP";
    
    public $timestamps = false;
}
