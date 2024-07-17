<x-admin-layout>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="card-header">
        <h3 class="ajout text-center text-uppercase border-bottom pb-2 mb-5">Ajout d'une nouvelle cliente</h3>
    </div>
    <div class="mt-4">
    
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
   
    <form style="width:100%" method="Post" action="{{route('admin.mfemme.ajouter')}}" class="form align-self-center">
    <div class="row  mb-4 col align-self-center" style="text-align: center; ">
        @csrf
        <!-- formulaire du selection -->
        <div  class="mb-3 col-3">
                <select name="client_id">
                    <option value="">Cliquez pour selenner le client</option>
                    <?php     foreach ($listemfemme as $key => $UnClient) { ?>
                        <option value="<?=$UnClient->id ?>" ><?=$UnClient->Nom ?> <?=$UnClient->Prenom ?></option>
     
                    <?php } ?>
                </select>
        </div>
        <div class="autocomplete mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Epaule</label>
            <input type="text" class="form-control" name="epaule" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">longueur de la manche</label>
            <input type="text" class="form-control" name="long_manche" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tour de manche</label>
            <input type="text" class="form-control" name="t_manche" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Poitrine</label>
            <input type="text" class="form-control" name="poitrine" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Dos</label>
            <input type="text" class="form-control" name="dos" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Frappe</label>
            <input type="text" class="form-control" name="frappe" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Ceinture</label>
            <input type="text" class="form-control" name="ceinture" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du pentalon</label>
            <input type="text" class="form-control" name="long_pentalon" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Cuisse</label>
            <input type="text" class="form-control" name="cuisse" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bassin</label>
            <input type="text" class="form-control" name="bassin" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur du genoux</label>
            <input type="text" class="form-control" name="long_genou" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Bas</label>
            <input type="text" class="form-control" name="bas" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tour de la taille</label>
            <input type="text" class="form-control" name="t_taille" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur totale</label>
            <input type="text" class="form-control" name="long_totale" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la taille</label>
            <input type="text" class="form-control" name="long_taille" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la robe</label>
            <input type="text" class="form-control" name="long_robe" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Longueur de la jupe</label>
            <input type="text" class="form-control" name="long_jupe" value="">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Epaule à manche</label>
            <input type="text" class="form-control" name="epaule_manche" value="">
        </div>
    <div class="text-center text-uppercase">
        <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
        <a href="{{route('admin.mfemme')}}" class="btn btn-danger">Annuler</a>
    </div>
    </div>

    <script src="{{ asset('js/creermf.js')}}"></script>
    </form>
        
    </div>
    
    
  </div>

</x-admin-layout>