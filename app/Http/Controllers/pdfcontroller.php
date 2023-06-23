<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfcontroller extends Controller
{
    public function generatepdf()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hello BABA</h1>');
        // return $pdf->stream();

    $pdf = Pdf::loadView('admin/demopdf')->setPaper('a4', 'portrait');
    return $pdf->stream();
    }
}