<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function download($id)
    {
        $invoice = Invoice::findOrFail($id);
        $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download('invoice.pdf');
    }

    public function sendEmail($id)
    {
        $invoice = Invoice::findOrFail($id);
        Mail::to('customer@example.com')->send(new InvoiceMail($invoice));
        return back()->with('success', 'Invoice sent!');
    }

}
