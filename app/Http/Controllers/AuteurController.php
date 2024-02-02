<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuteurRequest;
use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auteurs=Auteur::all();
        return view('auteur.index',compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auteur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuteurRequest $request)
    {
        $values=$request->validated();
        Auteur::create($values);
        return to_route('auteur.index')->with('success','le Auteur '.$request->nom.' est ajouter avec success ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $auteur=Auteur::find($id);
       return view('auteur.edit',compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuteurRequest $request, $id)
    {
        $auteur=Auteur::find($id);
        $auteur->nom=$request->nom;
        $auteur->prenom=$request->prenom;
        $auteur->save();
        return redirect()->route('auteur.index')->with('success','l\'auteur '.$request->nom.' est modifier avec success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auteur=Auteur::find($id);
        $auteur->delete();
        return redirect()->route('auteur.index')->with('success','l\'auteur '.$auteur->nom.' est supprimer avec success');

    }
}
