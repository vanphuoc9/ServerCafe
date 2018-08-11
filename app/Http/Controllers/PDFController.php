<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Barryvdh\DomPDF\Facades;
use App\Mon;
use App\LoaiMon;

class PDFController extends Controller
{
    //

    public function getPDF(){
    	$mon = Mon::all();
    	$loaimon = Mon::all();
    	$pdf = PDF::loadView('admin.pdf.customer',['mon'=>$mon]);
    	return $pdf->stream('customer.pdf');

    }
}
