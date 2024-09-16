<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $eleve = Eleve::findOrFail($id);

        $data = ['title' => 'domPDF in Laravel 10','eleve' =>$eleve];
        $pdf = PDF::loadView('pdf.document', $data);
        return $pdf->download('document.pdf');
    }}
