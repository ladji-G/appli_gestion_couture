<x-admin-layout>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="card-header">
        <h3 class="text-center text-uppercase border-bottom pb-2 mb-5">Ajout d'une nouvelle commande</h3>
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
    <form   method="POST" action="{{route('admin.commande.ajouter')}}" class="commande" style="width:75%">
        @csrf
    <div class="row  mb-4 col align-self-center" style="text-align: center; ">
        
        <div class="mb-3 col-6">
        <select name="" id="">
            <option value="select">selectionnez le genre</option>
            <option value="">Homme</option>
            <option value="">Femme</option>
            </select>
        </div> 
        <div class="mb-3 col-6">
            <select name="" id="">
            <option value="select">Cliquez et selectionner le Client</option>

                <?php foreach ($listemesure as $key => $mesure) { ?>
                    <option value="<?=$mesure->id ?>" ><?=$mesure->Nom ?> <?=$mesure->Prenom ?></option>

                <?php } ?>
            </select>
        </div>
        <div class="mb-3 col-6">
            <select name="" id="">
                <option value="select">Cliquez et selectionner l'image</option>
                    
            </select>
        </div> 
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Nombre d'exemplaire de commande</label>
            <input type="integer" class="form-control" name="nb_exemplaire_cmd" value="{{ old('nb_exemplaire_cmd') }}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Date de livraision</label>
            <input type="date" class="form-control" name="date_livraison" value="{{ old('date_livraison') }}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Montant total</label>
            <input type="text" class="form-control" name="montt_total" value="{{ old('montt_total') }}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Montant payé</label>
            <input type="text" class="form-control" name="montt_paye" value="{{ old('montt_paye') }}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Montant restant</label>
            <input type="text" class="form-control" name="montt_restant" value="{{ old('montt_restant') }}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Pourcentage de reduction</label>
            <input type="text" class="form-control" name="pourcentage_reduction" value="{{ old('pourcentage_reduction') }}">
        </div>
        <div class="mb-3 form-group">
            <label for="exampleInputEmail1" class="form-label"></label>
            <textarea style="width: 60%;" name="Description" placeholder="Entrer votre Description" rows="10"></textarea>
            
        </div>
    <div class="text-center text-uppercase">
        <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
        <a href="{{route('admin.commande')}}" class="btn btn-danger">Annuler</a>
    </div>
    </div>
    </form>
        
    </div>
    
    
  </div>

</x-admin-layout>