
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
                    <h1 class="text-center">Edit-Emprunt</h1>
                    <form action="{{ route('emprunt.update',$emprunt->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @error('livre_id')
                        <x-alert type='danger'>
                            {{$message}}
                        </x-alert>
                        @enderror
                        <label class="col-form-label">Livre</label>
                        <select name="livre_id" class="form-control">
                            <option selected value="{{$emprunt->livre_id}}">{{$emprunt->livre->titre}}</option>
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
                        <input type="date" name="date_emprunt" value="{{old('date_emprunt',$emprunt->date_emprunt)}}" class="form-control">
                        @error('date_retour')
                        <x-alert type='danger'>
                            {{$message}}
                        </x-alert>
                        @enderror
                         <label class="col-form-label">date_retour</label>
                        <input type="date" name="date_retour" value="{{old('date_retour',$emprunt->date_emprunt)}}" class="form-control">
                        <button type="submit" class="btn btn-dark w-100 my-3">edit</button>

                    </form>


                </div>
            </center>
        </div>
    </div>
</div>
@endsection

