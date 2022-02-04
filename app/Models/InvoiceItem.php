<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $collection = 'InvoiceItem';
    protected $table = 'invoice_items';

    public function Invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
