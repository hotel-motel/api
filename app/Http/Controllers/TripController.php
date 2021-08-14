<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Trip;
use App\Models\Payment;
use Carbon\CarbonPeriod;
use App\Models\passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Shetabit\Payment\Facade\Payment as PaymentGateway;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class TripController extends Controller
{
    public function store(Room $room, Request $request)
    {
        Validator::make($request->all(), [
            'start'=>'required|date',
            'passengers'=>'required|array',
            'end'=>'required|date|after:start',
            'passengers.*.last_name'=>'required',
            'passengers.*.first_name'=>'required',
            'passengers.*.national_code'=>'required|size:10'
        ])->validate();
        if (sizeof($request->passengers)>$room->max_capacity){
            return abort(403, 'passenger count is more than room capacity');
        }
        $tripDays=CarbonPeriod::create($request->start, $request->end);
        $tripsInDate=$room->trips->filter(function ($trip) use ($request, $tripDays){
            foreach ($tripDays as $day){
                if ($day>=$trip->start && $day<=$trip->end){
                    return $trip;
                }
            }
        });
        if ($tripsInDate->count()>0){
            return abort(403, 'reserved for this period');
        }
        $trip=Trip::create([
            'start'=>$request->start,
            'end'=>$request->end,
            'room_id'=>$room->id,
            'amount'=>$room->price*$tripDays->count(),
            'creator_id'=>auth()->id()
        ]);
        foreach ($request->passengers as $passenger){
            passenger::create([
                'first_name'=>$passenger['first_name'],
                'last_name'=>$passenger['last_name'],
                'national_code'=>$passenger['national_code'],
                'trip_id'=>$trip->id
            ]);
        }
        return $trip->id;
    }

    public function pay(Trip $trip)
    {
        //TODO: check payment not paid before
        $payment=new Payment([
            'trip_id'=>$trip->id,
            'amount'=>$trip->amount
        ]);
        return $payment->redirectToGateway();
    }

    public function verify_pay(Request $request)
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
