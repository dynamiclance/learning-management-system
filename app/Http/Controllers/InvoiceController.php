<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index');
    }

    public function show($id)
    {



        $DBinvoice = Invoice::findOrFail($id);

        //dd($DBinvoice);

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
            $items[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);

            //  dd($items);
        }



        // payments
        foreach ($DBinvoice->payments as $payment) {
            $items[] = (new InvoiceItem())->title('Payment')->pricePerUnit(-$payment->amount)->quantity(1);

            // dd($items);
        }

        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->buyer($client)
            ->currencySymbol('$')
            ->addItems($items);

        return $invoice->stream();
    }

}