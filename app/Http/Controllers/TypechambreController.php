<?php

namespace App\Http\Controllers;

use App\Models\typechambre;
use Illuminate\Http\Request;

class TypechambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typechambre=typechambre::all();
        return response()->json([
            'typechambre'=>$typechambre
        ],200);
    }  public function index1(typechambre $typechambre)
    {
        $typechambre=typechambre::all()->find($typechambre);
        return response()->json([
            'typechambre'=>$typechambre
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(typechambre $typechambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(typechambre $typechambre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, typechambre $typechambre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(typechambre $typechambre)
    {
        //
    }
}
