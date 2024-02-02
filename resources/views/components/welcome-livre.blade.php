<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@props(['livres'])
<div class="container">
    <div class="row mt-3 justify-content-between">
        @foreach ($livres as $livre)
        <div  class=" card col-lg-3 col-md-6 col-sm-12" style="width: 17rem;margin-bottom:40px;">
            @if ($livre->image!=='')
    <img class="card-img-top" style="height:300px" src="{{asset('storage/'.$livre->image)}}" alt="Title" />
    @endif
            <div class="card-body">
                <h4 class="card-title">{{$livre->titre}}</h4>
                <p class="card-text">Auteur: <strong>{{$livre->auteur->nom}}-{{$livre->auteur->prenom}}</strong></p>
                <p class="card-text">pages: <strong>{{$livre->nombre_page}}</strong></p>
                <p class="card-text">annee: <strong>{{$livre->annee_publication}}</strong></p>
                <span style="color:orange;">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                        </span>

                            <p class="card-text text-secondary mt-2">Stock :<b class="text-success font-weight-bold"> Available </b></p>
            </div>
        </div>


        @endforeach
    </div>
</div>
</div>
