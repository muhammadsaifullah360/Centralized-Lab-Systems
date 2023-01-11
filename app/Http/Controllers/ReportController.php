<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;


class ReportController extends Controller
{
    public function index()
    {
        return view('patient.test_report');
    }

    public function generatePDF()

    {
        $pdf = PDF::loadView('patient.report');
        return $pdf->download('report.pdf');

    }
}
