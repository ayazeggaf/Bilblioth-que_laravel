@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-6 col-sm-12  " id="img-signin">
            <img src="{{asset('images/img1.webp')}}" alt="#" width="500px">
            </div>
            <div class="col-lg-6 col-sm-12 mt-5">
                <h4 class="text-center">Add_livre</h4>
                <form action="{{route('livre.store')}}" method="post" class="bg-light w-75" enctype="multipart/form-data">
                    @csrf
                    @error('titre')
                    <x-alert type='danger'>
                    {{$message}}
                    </x-alert>
                    @enderror
                    <label  class="col-form-label">Titre</label>
                    <input type="text" name="titre" class="form-control" value="{{old('titre')}}">
                    @error('image')
                    <x-alert type='danger'>
                    {{$message}}
                    </x-alert>
                    @enderror
                    <label  class="col-form-label">Image</label>
                    <input type="file" name="image" class="form-control" >
                    @error('annee_publication')
                    <x-alert type='danger'>
                    {{$message}}
                    </x-alert>
                    @enderror
                    <label  class="col-form-label">annee_publication</label>
                    <input type="date" name="annee_publication" class="form-control" value="{{old('annee_publication')}}">
                    @error('nombre_page')
                    <x-alert type='danger'>
                    {{$message}}
                    </x-alert>
                    @enderror
                    <label  class="col-form-label">nombre_page</label>
                    <input type="number" name="nombre_page" min="1" class="form-control" value="{{old('nombre_page')}}">
                    @error('auteur_id')
                    <x-alert type='danger'>
                    {{$message}}
                    </x-alert>
                    @enderror
                    <label  class="col-form-label">Auteur</label>
                    <select name="auteur_id" class="form-control w-100 text-center" >
                        <option  selected disabled>-choisir-auteur-</option>
                        @foreach ($auteurs as $auteur)
                        <option value="{{$auteur->id}}">{{$auteur->prenom}}-{{$auteur->nom}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="w-100 mt-2 btn btn-dark">Add</button>



                </form>
            </div>

    <div>



    </div>
    </div>
@endsection


