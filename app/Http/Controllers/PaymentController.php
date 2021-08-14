<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Payment;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment as PaymentGateway;

class PaymentController extends Controller
{
    public function pay(Trip $trip)
    {
        //TODO: check payment not paid before
        $payment=new Payment([
            'trip_id'=>$trip->id,
            'amount'=>$trip->amount
        ]);
        return $payment->redirectToGateway();
    }

    public function verify(Request $request)
    {
        try {
            $payment=Payment::where(['transaction_id'=> $request->Authority, 'reference_id'=>null])->firstOrFail();
            $receipt = PaymentGateway::amount($payment->amount)->transactionId($request->Authority)->verify();
            $payment->update(['reference_id'=>$receipt->getReferenceId()]);
            //TODO: increase hotel account credit
            return 'success';
            //TODO: show some view
        } catch (InvalidPaymentException $exception) {
            return response($exception->getMessage(), 422);
        }
    }
}
