<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Apartment;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;
use USD;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('payments.index', [
        'payments'    => PaymentResource::collection( Payment::with('apartment')->get() ),
        'usd_price'   => USD::getUsdPrice(),
        'format_date' => Carbon::now()->formatLocalized('%a %d %B %G')
      ]);
    }

    public function create(){
      return view('payments.create', ['apartments' => Apartment::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $payment = Payment::create([
        'apartment_id' => $request->apartment_id,
        'date'         => $request->date,
        'paid_at'      => $request->paid_at,
        'method'       => $request->method,
        'amount'       => $request->amount,
        'reference'    => $request->reference,
      ]);

      return response()->json(['payment' => $payment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
      return response()->json(['payment' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
      $payment->update([
        'apartment_id' => $request->apartment_id,
        'date'         => $request->date,
        'method'       => $request->method,
        'reference'    => $request->reference,
      ]);

      return response()->json(['payment' => $payment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
