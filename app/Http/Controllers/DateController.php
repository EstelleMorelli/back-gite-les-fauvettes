<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return $dates = Date::all();
        //
    }

    public function create(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'unavailables' => 'required|array',
            'unavailables.*.start' => 'required|date',
            'unavailables.*.end' => 'required|date|after_or_equal:unavailables.*.start',
        ]);
    
        // Traitement des objets du tableau
        $createdUnavailables = [];
        foreach ($validated['unavailables'] as $unavailables) {
            $createdUnavailables[] = Date::create([
                'start' => $unavailables['start'],
                'end' => $unavailables['end'],
            ]);
        }
    
        // Retourne la réponse JSON avec les enregistrements créés
        return response()->json([
            'success' => true,
            'data' => $createdUnavailables,
            'message' => 'Les dates d\'indisponibilité ont été créées avec succès.'
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $date = Date::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $validated = $request->validate([
            'unavailables' => 'required|array',
            'unavailables.*.start' => 'required|date',
            'unavailables.*.end' => 'required|date',
        ]);

        // Traitement des objets du tableau
        $createdUnavailables = [];
        foreach ($validated['unavailables'] as $unavailables) {
            $createdUnavailables[] = Date::create([
                'start' => $unavailables['start'],
                'end' => $unavailables['end'],
            ]);
        }
        // Retourne la réponse JSON avec les enregistrements créés
        return response()->json([
            'success' => true,
            'data' => $createdUnavailables,
            'message' => 'Les dates d\'indisponibilité ont été créées avec succès.'
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $unavailables = Date::findOrFail($id);
        if ($unavailables->delete()){
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
