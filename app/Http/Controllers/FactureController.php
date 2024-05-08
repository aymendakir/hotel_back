<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $facture=facture::latest()->take(1)->get();
        return response()->json([
            'facture'=>$facture
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
        $validator= Validator::make($request->all(),[
           'montant_ht' => 'required',
           'paiement_id'=>'required',
           'montant_total'=>'nullable',



       ]);
        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);;
$facture=new facture();
$facture::create([


    'montant_total' => $request->montant_total,
    'montant_ht' => $request->montant_ht,

    'paiement_id'=>$request->paiement_id,


]); return response()->json([
        'message '=>'facture added successfully'
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(facture $facture)
    {
        //
    }
}
