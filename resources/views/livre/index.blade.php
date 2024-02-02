
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">Livres</h1>
    <div class="row">
        @foreach ($livres as $livre)
            <div class="col-sm-12 col-md-4 col-lg-3">
                <x-livre :livre="$livre" />
            </div>
        @endforeach
    </div>
</div>
{{$livres->links()}}
@endsection
