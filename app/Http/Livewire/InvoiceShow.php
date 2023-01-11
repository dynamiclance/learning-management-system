<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Livewire\Component;

class InvoiceShow extends Component
{
    public $selectedCourseId;

    public function render()

    {
       $invoice = Invoice::where('id', $this->selectedCourseId)->with('user')->first();
        $courseItem = InvoiceItem::where('id', $this->selectedCourseId)->first();
        // dd($courseItem);


        return view('livewire.invoice-show', [ 
            'invoice' => $invoice,
            'courseItem' => $courseItem,
        ]);
    }
}
