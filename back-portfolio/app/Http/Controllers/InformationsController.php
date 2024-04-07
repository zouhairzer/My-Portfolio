<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\informations;

class InformationsController extends Controller
{
    public function addInfo(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'numero' => 'required',
            'adresse' => 'required',
            'date' => 'required',
        ]);

        $info = new informations();

        $info->name=$request->name;
        $info->prenom=$request->prenom;
        $info->email=$request->email;
        $info->numero=$request->numero;
        $info->adresse=$request->adresse;
        $info->date=$request->date;
        $info->save();
        // dd($info);


        return response()->json(['message'=>'ajouter avec success', $info]);
    }


    public function getInfo()
    {
        $afficherInfo = informations::all();
        return response()->json($afficherInfo);
    }


    public function deleteInfo($id)
    {
        $deleteInfo = informations::findOrFail($id)->delete();
        return response()->json(['message'=>'success']);
    }



    public function updateInfo(Request $request, $id)
    {

        $info = informations::findOrFail($id);

        $info->name=$request->name;
        $info->prenom=$request->prenom;
        $info->email=$request->email;
        $info->numero=$request->numero;
        $info->adresse=$request->adresse;
        $info->date=$request->date;
        $info->save ();
        return response()->json(['message'=>'modifier success', $info]);
    }

}
