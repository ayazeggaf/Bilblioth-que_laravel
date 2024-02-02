<div>
   @props(['livre'])
<div class="card mb-2">
    @if ($livre->image!=='')
    <img class="card-img-top" style="height:300px" src="{{asset('storage/'.$livre->image)}}" alt="Title" />
    @endif
    <div class="card-body">
        <h4 class="card-title">{{$livre->titre}}</h4>
        <p class="card-text">nombre_page: <b>{{$livre->nombre_page}}</b></p>
        <p class="card-text">anne_publication:<b>{{$livre->annee_publication}}</b></p>
        <p class="card-text">auteur::<b>{{$livre->auteur->nom}}</b></p>
        <div class="d-flex">
            <a class="btn btn-dark d-flex mx-3" href="{{route('livre.edit',$livre->id)}}">update</a>
            <a class="btn btn-danger d-flex mx-3" href="{{route('livre.delete',$livre->id)}}">delete</a>
        </div>
    </div>
</div>

</div>
