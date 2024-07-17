<x-admin-layout>
  <div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
  <div class="card-header">
        <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Edition d'un employé</h3>
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
    <form style="width:75%" class="form" method="Post" action="{{route('admin.client.update', ['client'=>$client->id])}}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Genre</label>
            <input type="text" class="form-control" name="Nom" value="{{$client->genre}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="Nom" value="{{$client->Nom}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prenom</label>
            <input type="text" class="form-control" name="Prenom" value="{{$client->Prenom}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" value="{{$client->adresse}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telephone</label>
            <input type="integer" class="form-control" name="telephone" value="{{$client->telephone}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$client->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date de la dernière commande</label>
            <input type="date" class="form-control" name="date_dernier_commande" value="{{$client->date_dernier_commande}}">
        </div>
    <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
    <a href="{{route('admin.client')}}" class="btn btn-danger">Annuler</a>
    </form>
        
    </div>
    
    
  </div>

</x-admin-layout>