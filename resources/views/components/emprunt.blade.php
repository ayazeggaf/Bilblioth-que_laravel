<div class="card my-3">
    @if ($emprunt->livre->image!=='')
    <img class="card-img-top" style="height:300px" src="{{asset('storage/'.$emprunt->livre->image)}}" alt="Title" />
    @endif
    <div class="card-body">
        <h4 class="card-title">{{$emprunt->livre->titre}}</h4>
        <p class="card-text">Date_emprunt:<strong>{{$emprunt->date_emprunt}}</strong></p>
        <p class="card-text">Date_retour:<strong>{{$emprunt->date_retour}}</strong></p>
        <p class="card-text">Auteur:<strong>{{$emprunt->livre->auteur->nom}}-{{$emprunt->livre->auteur->prenom}}</strong></p>
        <div class="d-flex ">
            <a href="{{route('emprunt.edit',$emprunt->id)}}" class="btn btn-dark my-2">Edit</a>
            <form action="{{route('emprunt.destroy',$emprunt->id)}}" method="post"  onsubmit="confirm('tu es sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger my-2">Delete</button>

            </form>
        </div>
    </div>
</div>

