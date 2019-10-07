<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a pdf file.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = PDF::loadView('pdf');

        return $pdf->stream('entry-form.pdf');
    }
}
