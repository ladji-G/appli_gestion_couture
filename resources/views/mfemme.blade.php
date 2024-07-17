<x-app-layout>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Les mésures de la clientes</h3>

    <div class="">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{route('mfemme.creer')}}" class="btn btn-primary">Ajouter une nouvelle mesure</a>
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
      <th style="width: 200px;" scope="col">Toure de manche</th>
      <th style="width: 200px;" scope="col">Poitrine</th>
      <th style="width: 250px;" scope="col">Action</th>
    </tr>
    </thead>
  <tbody class="table-group-divider">
    @foreach($mfemme as $mfemme)
    <tr>
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $mfemme->nom}}</td>
      <td>{{ $mfemme->epaule}}</td>
      <td>{{ $mfemme->long_manche }}</td>
      <td>{{ $mfemme->t_manche }}</td>
      <td>{{ $mfemme-> poitrine}}</td>
      <td>
        <a href="#" class="btn btn-primary">Plus</a>
        <a href="{{ route('mfemme.edit', ['mfemme'=>$mfemme->id]) }}" class="btn btn-info">Editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ces données?'))
        {document.getElementById('admin.form-{{$mfemme->id}}').submit() }">Supprimer</a>
        <form id="form-{{$mfemme->id}}" action="{{route('mfemme.supprimer', ['mfemme'=>$mfemme->id])}}"
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