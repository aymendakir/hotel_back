<?php

namespace App\Http\Controllers;

use App\Models\chambre;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambers=chambre::all();//->where('status','disp');
        return response()->json([
            'chambers'=>$chambers
        ],200);
    }
    public function index1()
    {
        $chambers=chambre::all()->where('Chambre_etat','Available');
        return response()->json([
            'chambers'=>$chambers
        ],200);
    }
    public function show(chambre $chambre )
    {
        $chamber=chambre::find($chambre);
        return response()->json($chamber);

    }
    public function show1(chambre $chambre )
{
    $chamber=chambre::all()->find($chambre);
    return response()->json($chamber);

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [

            'image' => 'required|image',
            'price'=>'required',
            'Chambre_etat'=>'required',
            'type'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fileName = Str::uuid() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images', $fileName);

        $chamber=new chambre();

        $chamber::create([

            'image'=>$fileName,

            'price'=>$request->price,
            'Chambre_etat'=>$request->Chambre_etat,
            'type'=>$request->type

        ]); return response()->json([
        'message '=>'item added successfully'
    ]);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chambre $chambre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chambre $chambre)
    {
        //
        $validator = Validator::make($request->all(), [

            'image' => 'nullable|image',
            'price' => 'nullable',
            'Chambre_etat'=>'nullable'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($request->hasFile('image')) {
            if ($chambre->image) {
                $exist = Storage::disk('public')->exists("/images/{$chambre->image}");
                if ($exist) {
                    Storage::disk('public')->delete("/images/{$chambre->image}");
                }
            }

            $fileName = Str::uuid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $fileName);
        } else {
            $fileName = $chambre->image; // Preserve the existing image if no new image is uploaded
        }


        $chamber=chambre::find($chambre);

        $chambre->update([
            'image'=>$fileName,
            'price'=>$request->price,
            'Chambre_etat'=>$request->Chambre_etat

        ]); return response()->json([
        'message '=>'item update successfully'
    ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chambre $chambre)
    {
        //
        if ($chambre->image){
            $exist=Storage::disk('public')->exists("/images/{$chambre->image}");
            if ($exist){
                $exist=Storage::disk('public')->delete("/images/{$chambre->image}");

            }
        }

        $chambre->delete();
        return response()->json([
            'message'=>'delete is done'
        ]);
    }
}
