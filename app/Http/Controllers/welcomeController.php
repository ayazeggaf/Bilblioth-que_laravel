<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
   public function index(){
    $livres=Livre::all();
    return view('welcome',compact('livres'));
   }
}
