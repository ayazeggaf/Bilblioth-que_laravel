<h4 class="text-center">
    Auteurs
   </h4>
   <table class="table table-striped">
     <tr><th>Nom</th>
         <th>prenom</th>
         <th>vos-livre</th>
         <th colspan="2">action</th>
     </tr>
     @foreach ($auteurs as $auteur)
<tr>
    <td>{{$auteur->nom}}</td>
    <td>{{$auteur->prenom}}</td>
    <td>@foreach ($auteur->livres as $livre)
        {{$livre->titre}}-
    @endforeach</td>
    <td><a href="{{route('auteur.edit',$auteur->id)}}" class="btn btn-dark ml-2">Update</a></td>
    <td>
        <form action="{{route('auteur.destroy',$auteur->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button  class="btn btn-danger ">Supprimer</button>

        </form>
    </td>
</tr>
@endforeach
</table>
