<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use LaravelDaily\Invoices\Classes\Party;
use Livewire\Component;

class InvoiceShow extends Component
{
    public $selectedCourseId;
    public $printDetails;
    
    public function render()

    {

       $invoice = Invoice::where('id', $this->selectedCourseId)->with('user')->first();
 
        return view('livewire.invoice-show', [ 
            'invoice' => $invoice,
            // 'courseItem' => $courseItem,
        ]);
    }


}
