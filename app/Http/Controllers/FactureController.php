<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $facture = facture::latest()->take(1)->get();
        return response()->json([
            'facture' => $facture
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
            'montant_ht' => 'required',
            'paiement_id' => 'required',
            'montant_total' => 'nullable',
            'reservation_id' => 'required',



        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        ;

        $facture = facture::create([


            'montant_total' => $request->montant_total,
            'montant_ht' => $request->montant_ht,
            'reservation_id' => $request->reservation_id,
            'paiement_id' => $request->paiement_id,


        ]);
        return response()->json([
            $facture
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(facture $facture)
    {
        //
        $facture = facture::find($facture);

        if ($facture) {


            return response()->json($facture);
        } else {
            return response()->json(['message' => 'Facture not found'], 404);
        }
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

        $request->validate([
            'pdf' => 'required',
        ]);

        // Generate a unique file name using a UUID
        $fileName = Str::uuid() . '.' . $request->file('pdf')->getClientOriginalExtension();

        // Store the file in the 'public/pdf' directory
        $request->file('pdf')->storeAs('public/pdf', $fileName);

        // Create a new Facture instance and save the file name in the database
        $factures = facture::find($facture);
        $facture->update([

            'pdf' => $fileName

        ]);




        return response()->json([
            'message' => 'File uploaded and saved successfully',
            'fileName' => $fileName,
        ]);
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
