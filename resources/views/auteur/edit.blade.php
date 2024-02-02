
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12  " id="img-signin">
            <img src="{{asset('images/img1.webp')}}" alt="#" width="500px">
            </div>
        <div class="col-lg-6 col-sm-12 mt-5">
            <div class="w-75 bg-light container-fluid">
                <h4>Add-auteur</h4>
                <form action="{{route('auteur.update',$auteur->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    @error('nom')
                    <x-alert type='danger'>{{$message}}</x-alert>
                    @enderror
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{old('nom',$auteur->nom)}}">
                    @error('prenom')
                    <x-alert type='danger'>{{$message}}</x-alert>
                    @enderror
                    <label>prenom</label>
                    <input type="text" name="prenom" class="form-control" value="{{old('prenom',$auteur->prenom)}}">
                    <button type="submit" class="btn btn-dark w-100 mt-3">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
