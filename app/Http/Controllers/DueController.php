<?php

namespace App\Http\Controllers;

use App\Models\Due;
use Illuminate\Http\Request;

class DueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(['dues'=>Due::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $due = Due::create([
        'date'   => $request->date,
        'amount' => $request->amount,
      ]);

      return response()->json(['due' => $due]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function show(Due $due)
    {
      return response()->json(['due' => $due]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Due $due)
    {
      $due->update([
        'date'   => $request->date,
        'amount' => $request->amount,
      ]);

      return response()->json(['due' => $due]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function destroy(Due $due)
    {
        //
    }
}
