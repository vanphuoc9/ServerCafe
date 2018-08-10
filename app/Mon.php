<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mon extends Model
{
    //
    protected $table = "mon";
    protected $primaryKey = "MAMON";
    protected $foreignKey = "MALOAI";
    public $timestamps = false;

    // mon thuoc loai mon nao?
    public function loaimonan(){
    	return $this->belongsTo('App\LoaiMon','MALOAI','MALOAI');
    }
}
