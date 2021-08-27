<?php

namespace App\Models;

use Shetabit\Multipay\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Shetabit\Payment\Facade\Payment as PaymentGateway;

class Payment extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function redirectToGateway()
    {
        $invoice=new Invoice;
        $invoice->amount(intval($this->amount));
        return PaymentGateway::purchase($invoice, function($driver, $transactionId) {
            $this->transaction_id=$transactionId;
            $this->save();
        })->pay()->render();;
        return '123';
    }
}
