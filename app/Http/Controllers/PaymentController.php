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
        abort_if($trip->payment()->exists(), 403, 'paid before');
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
            $payment->trip->room->hotel()->increment('credit', $payment->amount);
            return view('trip.payment-verify', ['trip'=> $payment->trip]);
        } catch (InvalidPaymentException $exception) {
            return view('trip.payment-verify', ['error'=> $exception->getMessage()]);
        }
    }
}
