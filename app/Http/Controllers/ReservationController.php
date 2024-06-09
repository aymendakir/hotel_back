<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [

            'date_entree' => 'required',
            'date_sortie' => 'required',
            'nb_adultes' => 'required',
            'nb_enfants' => 'required',
            'nb_nuits' => 'required',
            'etat_reservation' => 'required',
            'client_id' => 'required',
            'chambre_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }




        $reservation = Reservation::create([


            'date_entree' => $request->date_entree,
            'date_sortie' => $request->date_sortie,
            'nb_adultes' => $request->nb_adultes,
            'nb_enfants' => $request->nb_enfants,
            'nb_nuits' => $request->nb_nuits,
            'etat_reservation' => $request->etat_reservation,
            'client_id' => $request->client_id,
            'chambre_id' => $request->chambre_id,




        ]);
        return response()->json($reservation);

    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $reservation)
    {
        //
        $request->validate([
            'facture_id' => 'required',
        ]);



        // Create a new Facture instance and save the file name in the database
        $reservations = reservation::find($reservation);
        $reservation->update([

            'facture_id' => $request->facture_id

        ]);




        return response()->json([
            'message' => 'File uploaded and saved successfully',
            'facture' => $reservation,
        ]);
        //
    }
    public function annulation(Request $request, reservation $reservation)
    {
        //



        // Create a new Facture instance and save the file name in the database
        $reservations = reservation::find($reservation);
        $reservation->update([

            'etat_reservation' => "Annuler"

        ]);




        return response()->json([
            'message' => 'Annulation successfully',
            'facture' => $reservation,
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        //
    }
}
