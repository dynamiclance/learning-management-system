<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    //fillable fields
    protected $table = 'invoice_items';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'invoice_id'
<<<<<<< HEAD
    
=======
>>>>>>> 68a731de89fc0c52108713c7018010bced0a8605
    ];
}
