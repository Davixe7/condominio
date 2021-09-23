<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(['residents'=>Resident::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $resident = Resident::create([
        'dni'          => $request->dni,
        'gender'       => $request->gender,
        'name'         => $request->name,
        'birthdate'    => $request->birthdate,
        'email'        => $request->email,
        'apartment_id' => $request->apartment_id,
      ]);

      return response()->json(['resident' => $resident]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
      return response()->json(['resident' => $resident]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
      $resident->update([
        'dni'       => $request->dni,
        'gender'    => $request->gender,
        'name'      => $request->name,
        'birthdate' => $request->birthdate,
        'email'     => $request->email
      ]);

      return response()->json(['resident' => $resident]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        //
    }
}
