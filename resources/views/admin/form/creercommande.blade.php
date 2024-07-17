@extends('admin.layouts.app')
@section('admin')
<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h3 class="entete text-center text-uppercase border-bottom pb-0 mb-0">Attribution des commandes</h3>

  <div class="card cmd">
    <div class="card-header comd">
      Liste des commandes et des employés
    </div>
    <div class="card-body ">
      <form action="{{route('admin.commande.store')}}" method="post">
        @csrf
        <div class="mt-15">
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="employe">
            <option selected>Selectionner l'employé</option>
            @foreach($listemploye as $employe)
            <option value="{{$employe->id}}">{{$employe->name}} {{$employe->Prenom}} </option>
            @endforeach
          </select>
        </div>
        <!-- <div>
          <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="client">
            <option selected>Selection le client</option>
            @foreach($client as $unclient)
            <option value="{{$unclient->id}}"><a href="{{ route('admin.commande.store', ['id' => $unclient->id]) }}">{{$unclient->name}} {{$unclient->prenom}} {{$unclient->contact}}</a></option>
            @endforeach
          </select>
        </div> -->
        <div>
          <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="panier" require>
            <option value="" selected>Selectionner la commande</option>
            @foreach($paniers as $panier)
            <option value="{{$panier->id}}"><a href="{{ route('admin.commande.store', ['id' => $panier->id]) }}">{{$panier->user->name}} {{$panier->user->prenom}} {{$panier->user->contact}}</a></option>
            @endforeach
          </select>
        </div>
        <input type="submit" value="Attribuer" class="btn atr btn-primary bg-primary">
      </form>
    </div>
  </div>

</div>

@endsection