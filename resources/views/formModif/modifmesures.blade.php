<x-app-layout>

  <div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
  <div class="card-header">
        <h3 class="text-center text-uppercase border-bottom pb-2 mb-5">Edition de la mesure</h3>
    </div>

    <div class="formulaire mt-4">
    
    @if(session()->has("success"))
        <div class="alert alert-success">
            <h4>{{session()->get('success')}}</h4>
        </div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
    @foreach($mesures as $mesure)
        @endforeach
    <form style="width:75%" class="form" method="Post" action="{{route('mesure.update',$mesure->id)}} " class="align-self-center">
    <div class="row  mb-4 col align-self-center" style="text-align: center;">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" value="{{$mesure->nom}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Epaule</label>
            <input type="text" class="form-control col-4" name="epaule" value="{{$mesure->epaule}}">
        </div>
        <div class="mb-3 col-3 ">
            <label for="exampleInputEmail1" class="form-label">longueur de la manche</label>
            <input type="text" class="form-control" name="long_manche" value="{{$mesure->long_manche}}">
        </div>
        <div class="mb-3 col-3 " >
            <label for="exampleInputEmail1" class="form-label">Tour de manche</label>
            <input type="text" class="form-control" name="t_manche" value="{{$mesure->t_manche}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Poitrine</label>
            <input type="text" class="form-control" name="poitrine" value="{{$mesure->poitrine}}">
        </div>
        <div class="mb-3 col-3 row-">
            <label for="exampleInputEmail1" class="form-label">Dos</label>
            <input type="text" class="form-control" name="dos" value="{{$mesure->dos}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Frappe</label>
            <input type="text" class="form-control" name="frappe" value="{{$mesure->frappe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Ceinture</label>
            <input type="text" class="form-control" name="ceinture" value="{{$mesure->ceinture}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du pentalon</label>
            <input type="text" class="form-control" name="long_pentalon" value="{{$mesure->long_pentalon}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Cuisse</label>
            <input type="text" class="form-control" name="cuisse" value="{{$mesure->cuisse}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bassin</label>
            <input type="text" class="form-control" name="bassin" value="{{$mesure->bassin}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du genoux</label>
            <input type="text" class="form-control" name="long_genou" value="{{$mesure->long_genou}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bas</label>
            <input type="text" class="form-control" name="bas" value="{{$mesure->bas}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tour de la taille</label>
            <input type="text" class="form-control" name="t_taille" value="{{$mesure->t_taille}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur totale</label>
            <input type="text" class="form-control" name="long_totale" value="{{$mesure->long_totale}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la taille</label>
            <input type="text" class="form-control" name="long_taille" value="{{$mesure->long_taille}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la robe</label>
            <input type="text" class="form-control" name="long_robe" value="{{$mesure->long_robe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la jupe</label>
            <input type="text" class="form-control" name="long_jupe" value="{{$mesure->long_jupe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">De l'épaule à la manche</label>
            <input type="text" class="form-control" name="epaule_manche" value="{{$mesure->epaule_manche}}">
        </div>
    <div class="text-center text-uppercase">  
    <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
    <a href="{{route('mesure')}}" class="btn btn-danger">Annuler</a>
    </div>
    </div>
    </form>
        
    </div>
    
    
  </div>

</x-pp-layout>