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
        $courseItem = InvoiceItem::where('id', $this->selectedCourseId)->first();
        

        return view('livewire.invoice-show', [ 
            'invoice' => $invoice,
            'courseItem' => $courseItem,
        ]);
    }


    // public function clickHandle($id){
    //     dd('test');
    // }

    public function printDetails($id)
    
    {

        dd($id);

        $DBinvoice = Invoice::findOrFail($id);

      //  dd($DBinvoice);

        $client = new Party([
            'name'          => 'Sajib Khan',
            'phone'         => '0173202983783',
            'custom_fields' => [
                'email'       => 'saifd@gmail.com',
            ],
        ]);


        // $customer = new Buyer([
        //     'name' => $DBinvoice->user->name,
        //     'custom_fields' => [
        //         'email' => $DBinvoice->user->email,
        //     ],
        // ]);



        $items = [];
        foreach ($DBinvoice->items as $item) {
            $items[] = (new \LaravelDaily\Invoices\Classes\InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);

            //dd($items);
        }



        // payments
        foreach ($DBinvoice->payments as $payment) {
            $items[] = (new \LaravelDaily\Invoices\Classes\InvoiceItem())->title('Payment')->pricePerUnit(-$payment->amount)->quantity(1);

            //  dd($items);
        }

        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->buyer($client)
            ->currencySymbol('$')
            ->addItems($items);

            // dd($invoice);

        return $invoice->stream();
    }



}
