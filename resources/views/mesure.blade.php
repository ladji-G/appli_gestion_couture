<x-app-layout>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Mesure</h3>

    <div class="">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{route('mesure.creer')}}" class="btn btn-primary">Ajouter une nouvelle mesure</a>
        </div>

      @if(session()->has("successDelete"))
        <div class="alert alert-success">
            <h4>{{session()->get('successDelete')}}</h4>
        </div>
      @endif
  <table class="table table-bordered table-hover">
    <thead>
    <tr>
      <th scope="col" style="width: 200px;">N°</th>
      <th scope="col" style="width: 200px;">Nom</th>
      <th scope="col" style="width: 200px;">Epaule</th>
      <th scope="col" style="width: 200px;">Longueur de la manche</th>
      <th scope="col" style="width: 200px;">Tour de la manche</th>
      <th style="width: 200px;" scope="col">Poitrine</th>
      <th style="width: 250px;" scope="col">Action</th>
    </tr>
    </thead>
  <tbody class="table-group-divider">
    @foreach($mesures as $mesure)
    
    <tr>
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $mesure->nom}}</td>
      <td>{{ $mesure->epaule}}</td>
      <td>{{ $mesure->long_manche }}</td>
      <td>{{ $mesure-> t_manche }}</td>
      <td>{{ $mesure-> poitrine }}</td>
      <td>
        <a href="#" class="btn btn-primary">Plus</a>
        <a href="{{ route('mesure.edit', ['mesure'=>$mesure->id]) }}" class="btn btn-info">Editer</a>
        <a href="#" style="padding-right: 9px;" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet employé?'))
        {document.getElementById('form-{{$mesure->id}}').submit() }">Supprimer</a>
        <form id="form-{{$mesure->id}}" action="{{route('mesure.supprimer', ['mesure'=>$mesure->id])}}"
         method="post">
        
          @csrf
          <input type="hidden" name="_method" value="delete">
          </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
    
    
  </div>

</x-app-layout>