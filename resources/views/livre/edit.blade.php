@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12  " id="img-signin">
                    <img src="{{asset('images/img1.webp')}}" alt="#" width="500px">
                    </div>
                <div class="col-lg-6 col-sm-12 mt-5">

         <form action="{{route('livre.update',$livre->id)}}" method="post" class="bg-light w-75" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             @error('titre')
             <x-alert type='danger'>
             {{$message}}
             </x-alert>
             @enderror
             <label  class="col-form-label">Titre</label>
             <input type="text" name="titre" class="form-control" value="{{old('titre',$livre->titre)}}">
             @error('image')
             <x-alert type='danger'>
             {{$message}}
             </x-alert>
             @enderror
             <label  class="col-form-label">Image</label>
             <input type="file" name="image" class="form-control" value="{{old('image',$livre->image)}}" >
             @error('annee_publication')
             <x-alert type='danger'>
             {{$message}}
             </x-alert>
             @enderror
             <label  class="col-form-label">annee_publication</label>
             <input type="date" name="annee_publication" class="form-control" value="{{old('annee_publication',$livre->annee_publication)}}">
             @error('nombre_page')
             <x-alert type='danger'>
             {{$message}}
             </x-alert>
             @enderror
             <label  class="col-form-label">nombre_page</label>
             <input type="number" name="nombre_page" min="1" class="form-control" value="{{old('nombre_page',$livre->nombre_page)}}">
             @error('auteur_id')
             <x-alert type='danger'>
             {{$message}}
             </x-alert>
             @enderror
             <label  class="col-form-label">Auteur</label>
             <select name="auteur_id" class="form-control w-50 text-center" >
                 <option  selected  value="{{$livre->auteur_id}}">{{$livre->auteur->nom}}</option>
                 @foreach ($auteurs as $auteur)
                 <option value="{{$auteur->id}}">{{$auteur->prenom}}-{{$auteur->nom}}</option>
                 @endforeach
             </select>
             <button type="submit" class="w-100 mt-2 btn btn-dark">edit</button>



         </form>
                </div>
    </div>
    </div>
@endsection
