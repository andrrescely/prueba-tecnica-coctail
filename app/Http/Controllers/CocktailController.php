<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index()
    {
        $cocteles = Cocktail::all();
        return view('cocteles.index', compact('cocteles'));
    }

    public function edit($id)
    {
        $coctel = Cocktail::findOrFail($id);
        return view('cocteles.edit', compact('coctel'));
    }

    public function update(Request $request, $id)
    {
        $coctel = Cocktail::findOrFail($id);
        $coctel->update($request->all());
        return redirect()->route('cocteles.index')->with('success', 'Cóctel actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $coctel = Cocktail::findOrFail($id);
        $coctel->delete();
        return redirect()->route('cocteles.index')->with('success', 'Cóctel eliminado exitosamente.');
    }
}
