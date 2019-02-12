<?php

namespace App\Model;

use App\Traits\Model\Globals;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    use Globals;

    protected $table = 'transactions';

    protected $fillable = [
        'transactable_id',
        'transactable_type',
        'transaction_type_id',
        'chart_account_id',
        'total_amount',
        'total_discount',
        'remarks',
        'checknumber',
        'refnum',
        'status',
        'vat_amount',
        'vatable_sales',
        'vatexempt_sales',
        'zerorated_sales',
        'created_by',
    ];

    protected $appends = ['item_ids'];

    
    public static function boot() {
        parent::boot();
        static::deleting(function($transaction) {
            $transaction->items()->detach();
            $transaction->purchaseReceived()->delete();
            $transaction->payee()->delete();
            $transaction->items()->delete();
        });
    }

    public function branch()
    {
        return $this->morphedByMany('App\Model\Branch', 'payable');
    }

    public function transactable()
    {

        return $this->morphTo();
    }

    public function chartAccount()
    {

        return $this->belongsTo('App\Model\ChartAccount');
    }

    public function transactionType()
    {

        return $this->belongsTo('App\Model\TransactionType');
    }

    public function createdUser()
    {

        return $this->hasOne('App\Model\User', 'id', 'created_by');
    }

    public function payee()
    {

        return $this->hasOne('App\Model\Payee', 'transaction_id', 'id');
    }

    public function generalLedgers()
    {

        return $this->hasMany('App\Model\GeneralLedger', 'transaction_id', 'id');
    }

    public function purchaseReceived()
    {
        return $this->belongsToMany('App\Model\PurchaseReceived', 'purchase_received_transaction', 'transaction_id', 'purchase_received_id')
            ->withPivot('id', 'discount', 'amount_due', 'amount_paid', 'date_due', 'description', 'vat_amount', 'vat_exempt_sales', 'vatable_sales', 'zero_rated_sales', 'pay')
            ->withTimestamps();
    }

    public function items()
    {
        return $this->belongsToMany('App\Model\Item', 'item_transaction', 'transaction_id', 'item_id')
            ->withPivot('id', 'discount', 'qty', 'price', 'amount', 'chart_account_id', 'tax_type',
                        'tax_type_id')
            ->withTimestamps();
    }
    public function scopeRelTable($query)
    {
        return $query->with(['chartAccount', 'transactionType', 'generalLedgers', 'purchaseReceived', 'items', 'payee', 'createdUser']);
    }

    public function getItemIdsAttribute(){
        return $this->items->pluck('id');
    }

    public function getVatAmountAttribute($val){
        
        if($val){
            return (float)$val;
        }
        return 0;
    }

    public function getVatableSalesAttribute($val){
        
        if($val){
            return (float)$val;
        }
        return 0;
    }
    public function getVatexemptSalesAttribute($val){
        
        if($val){
            return (float)$val;
        }
        return 0;
    }
    public function getZeroratedSalesAttribute($val){
        
        if($val){
            return (float)$val;
        }
        return 0;
    }

    public function getTotalAmountAttribute($val){
        
        if($val){
            return (float)$val;
        }
        return 0;
    }

    public function getTotalDiscountAttribute($val){
        
        if($val){
            return (float)$val;
        }
        return 0;
    }

}
