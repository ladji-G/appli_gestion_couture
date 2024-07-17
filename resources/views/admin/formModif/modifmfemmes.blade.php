<x-admin-layout>

  <div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
  <div class="card-header">
        <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Edition d'une cliente</h3>
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
    @foreach($mfemme as $mfemme)
        <li>{{$mfemme ->id  }}</li>
    @endforeach
    <form style="width:75%" class="form" method="Post" action="{{route('admin.mfemme.update', ['mfemme'=>$mfemme->id])}}" class="align-self-center">
    <div class="row  mb-4 col align-self-center" style="text-align: center;">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Epaule</label>
            <input type="text" class="form-control" name="epaule" value="{{$mfemme->epaule}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">longueur de la manche</label>
            <input type="text" class="form-control" name="long_manche" value="{{$mfemme->long_manche}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tour de manche</label>
            <input type="text" class="form-control" name="t_manche" value="{{$mfemme->t_manche}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Poitrine</label>
            <input type="text" class="form-control" name="poitrine" value="{{$mfemme->poitrine}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Dos</label>
            <input type="text" class="form-control" name="dos" value="{{$mfemme->dos}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Frappe</label>
            <input type="text" class="form-control" name="frappe" value="{{$mfemme->frappe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Ceinture</label>
            <input type="text" class="form-control" name="ceinture" value="{{$mfemme->ceinture}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du pentalon</label>
            <input type="text" class="form-control" name="long_pentalon" value="{{$mfemme->long_pentalon}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Cuisse</label>
            <input type="text" class="form-control" name="cuisse" value="{{$mfemme->cuisse}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bassin</label>
            <input type="text" class="form-control" name="bassin" value="{{$mfemme->bassin}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du genoux</label>
            <input type="text" class="form-control" name="long_genou" value="{{$mfemme->long_genou}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bas</label>
            <input type="text" class="form-control" name="bas" value="{{$mfemme->bas}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tour de la taille</label>
            <input type="text" class="form-control" name="t_taille" value="{{$mfemme->t_taille}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur totale</label>
            <input type="text" class="form-control" name="long_totale" value="{{$mfemme->long_totale}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la taille</label>
            <input type="text" class="form-control" name="long_taille" value="{{$mfemme->long_taille}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la robe</label>
            <input type="text" class="form-control" name="long_robe" value="{{$mfemme->long_robe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la jupe</label>
            <input type="text" class="form-control" name="long_jupe" value="{{$mfemme->long_jupe}}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">De l'épaule à la manche</label>
            <input type="text" class="form-control" name="epaule_manche" value="{{$mfemme->epaule_manche}}">
        </div>
        <div class="text-center text-uppercase">
        <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
        <a href="{{route('admin.mfemme')}}" class="btn btn-danger">Annuler</a>
        </div>
    </div>
    </form>
        
    </div>
    
    
  </div>

</x-admin-layout>