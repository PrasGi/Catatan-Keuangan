<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pengeluaran::all();
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
        $validateData = $request->validate(['jumlah_pengeluaran' => 'required']);

        $validateData['user_id'] = auth()->user()->id;

        if (Pengeluaran::create($validateData)) return response()->json([
            'message' => 'Success add data',
            'data' => $request->jumlah_pengeluaran
        ], 200);

        return response()->json([
            'message' => 'Failed add data',
            'data' => $request->jumlah_pengeluaran
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return $pengeluaran;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;

        if ($pengeluaran->save()) return response()->json([
            'message' => 'Success update data',
            'jumlah' => $request->jumlah_pengeluaran
        ], 200);

        return response()->json([
            'message' => 'Failed update data'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        if ($pengeluaran->delete()) return response()->json([
            'message' => 'Success delete data'
        ], 200);

        return response()->json(['message' => 'Failed delete data'], 400);
    }
}
