<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(['payments'=>Payment::all()]);
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
        'due_id'       => $request->due_id,
        'apartment_id' => $request->apartment_id,
        'date'         => $request->date,
        'method'       => $request->method,
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
        'due_id'       => $request->due_id,
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
