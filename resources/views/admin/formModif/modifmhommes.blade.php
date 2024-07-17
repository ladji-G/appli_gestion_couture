<x-admin-layout>

  <div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
  <div class="card-header">
        <h3 class="text-center text-uppercase border-bottom pb-2 mb-5">Edition d'un client</h3>
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
    @foreach($mhomme as $mhomme)
            <li>{{$mhomme ->id  }}</li>
        @endforeach
    <form style="width:75%" class="form" method="Post" action="{{route('admin.mhomme.update', ['mhomme'=>$mhomme->id])}} " class="align-self-center">
    <div class="row  mb-4 col align-self-center" style="text-align: center;">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Epaule</label>
            <input type="text" class="form-control col-4" name="epaule" value="{{$mhomme->epaule}}">
        </div>
        <div class="mb-3 col-3 ">
            <label for="exampleInputEmail1" class="form-label">longueur de la manche</label>
            <input type="text" class="form-control" name="long_manche" value="{{$mhomme->long_manche}}">
        </div>
        <div class="mb-3 col-3 " >
            <label for="exampleInputEmail1" class="form-label">Tour de manche</label>
            <input type="text" class="form-control" name="t_manche" value="{{$mhomme->t_manche}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Poitrine</label>
            <input type="text" class="form-control" name="poitrine" value="{{$mhomme->poitrine}}">
        </div>
        <div class="mb-3 col-3 row-">
            <label for="exampleInputEmail1" class="form-label">Dos</label>
            <input type="text" class="form-control" name="dos" value="{{$mhomme->dos}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Frappe</label>
            <input type="text" class="form-control" name="frappe" value="{{$mhomme->frappe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Ceinture</label>
            <input type="text" class="form-control" name="ceinture" value="{{$mhomme->ceinture}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du pentalon</label>
            <input type="text" class="form-control" name="long_pentalon" value="{{$mhomme->long_pentalon}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Cuisse</label>
            <input type="text" class="form-control" name="cuisse" value="{{$mhomme->cuisse}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bassin</label>
            <input type="text" class="form-control" name="bassin" value="{{$mhomme->bassin}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du genoux</label>
            <input type="text" class="form-control" name="long_genou" value="{{$mhomme->long_genou}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bas</label>
            <input type="text" class="form-control" name="bas" value="{{$mhomme->bas}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tour de la taille</label>
            <input type="text" class="form-control" name="t_taille" value="{{$mhomme->t_taille}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur totale</label>
            <input type="text" class="form-control" name="long_totale" value="{{$mhomme->long_totale}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la taille</label>
            <input type="text" class="form-control" name="long_taille" value="{{$mhomme->long_taille}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">De l'épaule à la manche</label>
            <input type="text" class="form-control" name="epaule_manche" value="{{$mhomme->epaule_manche}}">
        </div>
    <div class="text-center text-uppercase">  
    <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
    <a href="{{route('admin.mhomme')}}" class="btn btn-danger">Annuler</a>
    </div>
    </div>
    </form>
        
    </div>
    
    
  </div>

</x-admin-layout>