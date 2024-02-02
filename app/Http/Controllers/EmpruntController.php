<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmruntRequest;
use App\Models\Emprunt;
use App\Models\Livre;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmpruntController extends Controller
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
    public function index(Request $request)
    {
        $date1=$request->date1;
        $date2=$request->date2;
        $emprunts=Emprunt::all();
        if($date1 && $date2){
            $emprunts=Emprunt::where('date_emprunt',[$date1,$date2])
            ->orWhereBetween('date_retour',[$date1,$date2])->get();
            // $emprunts=Emprunt::where('date_emprunt','>',$date1)
            // ->where('date_retour','<',$date2)->get();
        }


       return view('emprunt.index',['emprunts'=>$emprunts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $livres=Livre::all();
        return view('emprunt.create',compact('livres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmruntRequest $request)
    {
       $value=$request->validated();
       $emprunt= Emprunt::where('livre_id', $value['livre_id'])
     ->whereBetween('date_emprunt', [$value['date_emprunt'], $value['date_retour']])
      ->orWhereBetween('date_retour', [$value['date_emprunt'], $value['date_retour']])
      ->exists();

       if($emprunt){
        return redirect()->route('emprunt.create')->with('danger','Le livre n\'est pas disponible pour ces dates');
       }
       Emprunt::create($value);
       return redirect()->route('emprunt.index')->with('success','vos emprunt est ajouter avec success');


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
        $emprunt=Emprunt::find($id);
        $livres=Livre::all();
        return view('emprunt.edit',['emprunt'=>$emprunt,'livres'=>$livres]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmruntRequest $request, $id)
    {    $value=$request->validated();
        $empruntExist= Emprunt::where('livre_id', $value['livre_id'])
        ->whereBetween('date_emprunt', [$value['date_emprunt'], $value['date_retour']])
         ->orWhereBetween('date_retour', [$value['date_emprunt'], $value['date_retour']])
        ->exists();
        if($empruntExist){
            return redirect()->route('emprunt.create')->with('danger','Le livre n\'est pas disponible pour ces dates');
           }
        else{
            $emprunt=Emprunt::find($id);
            $emprunt->livre_id=$request->livre_id;
            $emprunt->date_emprunt=$request->date_emprunt;
            $emprunt->date_retour=$request->date_retour;
            $emprunt->save();
            return redirect()->route('emprunt.index')->with('success','vos emprunt est modifier avec success');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprunt=Emprunt::find($id);
        $emprunt->delete();
        return redirect()->route('emprunt.index')->with('success','vos emprunt est supprimer avec success');

    }
}
