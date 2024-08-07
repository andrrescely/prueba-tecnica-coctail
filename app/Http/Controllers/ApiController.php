<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Cocktail;


class ApiController extends Controller
{
    public function getData()
    {
        $client = new Client();
        $response = $client->request('GET', 'www.thecocktaildb.com/api/json/v1/1/search.php?f=a');

        $cocktails = json_decode($response->getBody(), true)['drinks'];

        return view('api.data', compact('cocktails'));
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'instructions' => 'required|string',
            'thumbnail' => 'nullable|url',
        ]);

        // Crear el cóctel
        $cocktail = Cocktail::create([
            'name' => $request->input('name'),
            'instructions' => $request->input('instructions'),
            'thumbnail' => $request->input('thumbnail'),
        ]);

        return response()->json(['success' => 'REGISTRADO']);
    }

    public function index()
    {
        return Cocktail::all();
    }

    public function show($id)
    {
        return Cocktail::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Cocktail = Cocktail::findOrFail($id);
        $Cocktail->update($request->all());
        return $Cocktail;
    }

    public function destroy($id)
    {
        $Cocktail = Cocktail::findOrFail($id);
        $Cocktail->delete();
        return response()->json(['message' => 'Eliminado']);
    }
}
