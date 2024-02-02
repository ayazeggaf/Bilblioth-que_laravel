@extends('layouts.app')
@section('content')
<center>
    <div >
        <h4>Confirmation de suppression</h4>
        <x-alert type='danger'>tu es sure de supprimer <strong> {{$livre->titre}}</strong></x-alert>
        <div class="d-flex justify-content-center mx-3">
           <form action="{{route('livre.destroy',$livre->id)}}" method="post">
            @csrf
             @method('DELETE')
             <button   class="btn btn-danger ml-4">confirmer</button>


        </form>
           <a href="{{route('livre.index')}}" class="btn btn-success">annuler</a>
        </div>
    </div>
</center>
@endsection
