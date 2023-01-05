<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pemasukan::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(['jumlah_pemasukan' => 'required']);

        $validateData['user_id'] = auth()->user()->id;

        if (Pemasukan::create($validateData)) return response()->json([
            'message' => 'Success add data',
            'data' => $request->jumlah_pemasukan
        ], 200);

        return response()->json([
            'message' => 'Failed add data',
            'data' => $request->jumlah_pemasukan
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        return $pemasukan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;

        if ($pemasukan->save()) return response()->json([
           'message' => 'Success update data',
           'jumlah_pemasukan' => $request->jumlah_pemasukan
        ], 200);

        return response()->json([
            'message' => 'Failed update data'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        if ($pemasukan->delete()) return response()->json([
            'message' => 'Success delete data'
        ], 200);

        return response()->json(['message' => 'Failed delete data'], 400);
    }
}
