
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12  " id="img-signin">
            <img src="{{asset('images/img1.webp')}}" alt="#" width="500px">
            </div>
        <div class="col-lg-6 col-sm-12 mt-5">
            <center>
                <div class=" w-75 my-4 text-center p-5">
                    <h1 class="text-center">Add-Emprunt</h1>
                    <form action="{{ route('emprunt.store') }}" method="post">
                        @csrf
                        @error('livre_id')
                        <x-alert type='danger'>
                            {{$message}}
                        </x-alert>
                        @enderror
                        <label class="col-form-label">Livre</label>
                        <select name="livre_id" class="form-control">
                            <option selected disabled>--choisi un livre--</option>
                            @foreach ($livres as $livre)
                            <option value="{{$livre->id}}">{{$livre->titre}}</option>
                            @endforeach
                        </select>
                        @error('date_emprunt')
                        <x-alert type='danger'>
                            {{$message}}
                        </x-alert>
                        @enderror
                        <label class="col-form-label">date_emprunt</label>
                        <input type="date" name="date_emprunt" value="{{old('date_emprunt')}}" class="form-control">
                        @error('date_retour')
                        <x-alert type='danger'>
                            {{$message}}
                        </x-alert>
                        @enderror
                         <label class="col-form-label">date_retour</label>
                        <input type="date" name="date_retour" value="{{old('date_retour')}}" class="form-control">
                        <button type="submit" class="btn btn-light w-100 my-3">Ajouter</button>

                    </form>


                </div>
            </center>
        </div>
    </div>
</div>
@endsection
