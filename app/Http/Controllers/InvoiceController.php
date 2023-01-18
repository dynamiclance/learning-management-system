<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index');
    }


    public function edit($id) {
        return view('invoice.edit', [
            'invoice' => Invoice::findOrFail($id),
        ]);
    }


    public function show($id)
    {
        return view('invoice.show', [
            'id' => $id,
        ]);
    }

    

}