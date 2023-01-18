<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

    public function generate_pdf($id)
    {


        $invoice =  Invoice::with(['user','payments'])->findOrFail($id);

        $pdf = Pdf::loadView('billing_invoice',compact('invoice'));
        return $pdf->stream('billing-invoice.pdf');
    }

    public function pdfDownload($id)
    {
        $invoice =  Invoice::with(['user','payments'])->findOrFail($id);

        $pdf = Pdf::loadView('billing_invoice',compact('invoice'));
        return $pdf->download('invoice-details.pdf', );
    }



}
