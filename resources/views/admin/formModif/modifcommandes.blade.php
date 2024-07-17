@extends("layouts.master")

@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">
  <div class="card-header">
        <h3 class="text-center text-uppercase border-bottom pb-2 mb-5">Edition d'un Commande</h3>
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
    <form style="width:65%" method="Post" action="{{route('commandes.update', ['commandes'=>$commandes->id])}}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Client(e)</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->client_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre d'exemplaire de commande</label>
            <input type="text" class="form-control" name="Prenom" value="{{$commandes->nb_exemplaire_cmd}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date de commande</label>
            <input type="text" class="form-control" name="adresse" value="{{$commandes->date_cmd}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date de livraision</label>
            <input type="integer" class="form-control" name="telephone" value="{{$commandes->date_livraison}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Montant total</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->montt_total}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Montant payé</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->montt_paye}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Montant restant</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->montt_restant}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pourcentage de reduction</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->pourcentage_reduction}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mesure de la cliente</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->mfemmes_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mesure du client</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->mhommes_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Catalogue</label>
            <input type="text" class="form-control" name="email" value="{{$commandes->catalogue_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" name="Nom" value="{{$commandes->Description}}">
        </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{route('commandes')}}" class="btn btn-danger">Annuler</a>
    </form>
        
    </div>
    
    
  </div>

@endsection