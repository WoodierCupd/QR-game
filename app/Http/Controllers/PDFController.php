<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $questions = Question::all();
        $data = ['title' => 'All QR-Codes', 'questions' => $questions];
        $pdf = PDF::loadView('qr-codes-pdf', $data);

        return $pdf->download('qr-codes.pdf');
    }
}
