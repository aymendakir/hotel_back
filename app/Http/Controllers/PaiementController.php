<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paimeent=paiement::latest()->take(1)->get();
        return response()->json([
            'paiment'=>$paimeent
        ],200);
    } /* public function index2(paiement $paiement)
    {
        //
        return paiement::find(7)->facture_1;
    }*/

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
        $validator = Validator::make($request->all(), [

            'montant_total' => 'nullable',
            'montant_ht' => 'required',
            'Mode_de_paiement'=>'required',
            'paiement_etat'=>'required',
            'date_paiement'=>'required',
        ]);
        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);
        $paiment=new paiement();

        $paiment::create([
            'montant_total'=>$request->montant_total,
            'montant_ht'=>$request->montant_ht,
            'Mode_de_paiement'=>$request->Mode_de_paiement,
            'paiment_etat'=>$request->paiement_etat,
            'date_paiement'=>$request->date_paiement,
            'client_id'=>$request->client_id

        ]); return response()->json([
        'message '=>'item added successfully'
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paiement $paiement)
    {
        //
    }
}
