<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    //fillable
    protected $table = 'invoices';

    protected $fillable = [
        'due_date',
        'paid_date',
    ];

    public function item() {
        return $this->hasMany(InvoiceItem::class);
    }
}
