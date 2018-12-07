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
    	$pdf = PDF::loadView('admin.pdf.customer')->setPaper([0, 0, 850, 950], 'landscape');
    	
    	return $pdf->download('customer.pdf');

    }
}
