<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(['phones'=>Phone::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $phone = Phone::create([
        'number'         => $request->number,
        'whatsapp'       => $request->whatsapp,
        'phoneable_id'   => $request->phoneable_id,
        'phoneable_type' => $request->phoneable_type
      ]);

      return response()->json(['phone' => $phone]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
      return response()->json(['phone' => $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
      $phone->update([
        'number'         => $request->number,
        'whatsapp'       => $request->whatsapp,
        'phoneable_id'   => $request->phoneable_id,
        'phoneable_type' => $request->phoneable_type
      ]);

      return response()->json(['phone' => $phone]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
