<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Payment;
use Stripe\StripeClient;
use LaravelDaily\Invoices\Classes\Party;
use Livewire\Component;

class InvoiceEdit extends Component
{
    public $invoice_id;
    public $invoice;
    public $isAddItem = false;
    public $name;
    public $quantity;
    public $price;


    public function mount() {
        $this->invoice = Invoice::findOrFail($this->invoice_id);
    //    dd($this->invoice);
    }
    
    public function render()
    {
       // $invoice = Invoice::findOrFail($this->invoice_id);
        return view('livewire.invoice-edit');
    }

    public function addNewItem()
    {
        $this->isAddItem = !$this->isAddItem;

    }

    public function saveNewItem() {
        InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id,
        ]);

        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->invoice_id = '';

        flash()->addSuccess("New Item added successfully");

        return redirect()->route('invoice.edit', $this->invoice->id);
    }

    
    public function refund($payment_id) {
        
        $payment = Payment::findOrFail($payment_id);
        // dd($payment);

        if(strlen($payment->transaction_id) === 8) {
            $payment->delete();
            flash()->addSuccess("Cash Payment Refunded successfully");
            return redirect()->route('invoice.edit', $this->invoice->id);
           
        } else{
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $stripe->refunds->create([
                'charge' => $payment->transaction_id,
              ]);

              $payment->delete();

              flash()->addSuccess('Stripe payment Refund successfully');
            return redirect()->route('invoice.edit', $this->invoice->id);
              
        }

        return redirect()->route('invoice.edit', $this->invoice->id);



    }


    public function invoiceItemDelete($id) {
    
        $invoiceItem = InvoiceItem::findOrFail($id);
       
        $invoiceItem->delete();

        flash()->addSuccess('Invoice item deleted successfully');
        return redirect()->route('invoice.edit', $this->invoice->id);

    }



    public function printDetails()
    
    {

    $DBinvoice = Invoice::findOrFail($this->invoice_id);

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
