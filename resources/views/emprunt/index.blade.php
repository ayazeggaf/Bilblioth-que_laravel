
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Emprunts</h1>

    <div class="container">
        <div class="border rounded m-2 p-3 row">
            <form action="{{ route('emprunt.index') }}" method="get" class="row ">
                @csrf
                <h4 class="text-center col-12">Chercher un emprunt:</h4>
                <div class="col-md-4">
                    <input type="date" name="date1" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="date" name="date2" class="form-control" id="date2">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-dark col-12 ">Chercher</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($emprunts as $emprunt)
        <div class="col-sm-12 col-md-4 col-lg-3">
            <x-emprunt :emprunt="$emprunt"/>
        </div>
        @endforeach
    </div>
   </div>
@endsection

