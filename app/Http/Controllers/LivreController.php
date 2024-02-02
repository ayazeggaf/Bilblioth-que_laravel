<?php

namespace App\Http\Controllers;

use App\Events\LivreModifie;
use App\Models\Auteur;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

class LivreController extends Controller
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
        $livres=Livre::paginate(4);
        return view('livre.index',['livres'=>$livres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auteurs=Auteur::all();
        return view('livre.create',['auteurs'=>$auteurs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required|min:5|max:15',
            'image'=>'required|image|mimes:jpg,png,jpeg|max:2048',
            'annee_publication'=>'required',
            'nombre_page'=>'required',
            'auteur_id'=>'required',

        ]);
        $livre=new Livre();
        $livre->titre=$request->titre;
        $livre->annee_publication=$request->annee_publication;
        $livre->nombre_page=$request->nombre_page;
        $livre->auteur_id=$request->auteur_id;
        if($request->hasFile('image')){
           // $livre->image =$request->file('image')->store('images','public');
            $livre->image=$request->file('image')->storeAs('images',$request->file('image')->getClientOriginalName(),'public');
        }
        $livre->save();
        return redirect()->route('livre.index')->with('success','le livre est ajouter with success');


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
    {
        $livre=Livre::find($id);
        $auteurs=Auteur::all();

        return view('livre.edit',compact('livre','auteurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre'=>'required|min:5|max:15',
            'image'=>'image|mimes:jpg,png,jpeg|max:2048',
            'annee_publication'=>'required',
            'nombre_page'=>'required',
            'auteur_id'=>'required',
        ]);
       $livre=Livre::find($id);
       $livre->titre=$request->titre;
       $livre->annee_publication=$request->annee_publication;
       $livre->nombre_page=$request->nombre_page;
       $livre->auteur_id=$request->auteur_id;
       if($request->hasFile('image')){
        if($livre->image){
            $path=public_path('storage/'.$livre->image);
            if(fileExists($path)){
                File::delete($path);
            }
        }
        $livre->image=$request->image->store('images','public');
       }

       $livre->save();
       $livreId=$livre->id;
    //    dump($livreId);
    // ... Logique pour modifier le livre
    event(new LivreModifie($livreId, auth()->user()->id, 'Modification effectuée'));

       return to_route('livre.index')->with('success','le livre est modifier avec success!');
    }
    public function delete($id){
        $livre=Livre::find($id);
        return view('livre.delete',compact('livre'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livre=Livre::find($id);
        if($livre->image){
            $path=public_path(('storage'.$livre->image));
            if(fileExists($path)){
             File::delete($path);
            }
        }
        $livre->delete();
        return to_route('livre.index')->with('success','le livre est supprimer avec success!');
    }
}
