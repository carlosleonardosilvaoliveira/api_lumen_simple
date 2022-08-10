<?php

namespace App\Http\Controllers;

use App\Estudo;
use Illuminate\Http\Request;

class EstudoController extends Controller
{

    public function showAllEstudo()
    {
        return response()->json(Estudo::all());
    }

    public function showOneEstudo($id)
    {
        return response()->json(Estudo::find($id));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
           'name'       => 'required',
           'email'      => 'required|email|unique:estudos',
            'location'  => 'required|alpha'
        ]);

        $estudo = Estudo::create($request->all());

        return response()->json($estudo, 201);
    }

    public function update($id, Request $request)
    {
        $estudo = Estudo::findOrFail($id);
        $estudo->update($request->all());

        return response()->json($estudo, 200);
    }

    public function delete($id)
    {
        Estudo::findOrFail($id)->delete();
        return response('Deletado com sucesso', 200);
    }
}
