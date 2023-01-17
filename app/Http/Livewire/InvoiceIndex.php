<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceIndex extends Component
{
    public function render()
    {
        $invoices = Invoice::paginate(50);

        return view('livewire.invoice-index', [
            'invoices' => $invoices
        ]);
    }

    public function invoiceDelete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        // return redirect()->route('invoice.index');
    }
}
