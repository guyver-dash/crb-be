<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    
    protected $table = 'sale_orders';
    protected $fillable = [
        'purchase_id', 'purchasable_id', 'purchasable_type',
        'ref_number', 'ticket_id', 'ship_date', 'freight',' grand_total', 'created_by_id',
        'discount', 'vat_amount', 'vat_exempt_sales', 'vatable_sales', 'zero_rate_sales'
    ];
}
