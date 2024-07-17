@extends('admin.layouts.app')
    @section('admin')

<div class="my-3 p-3 bg-body rounded shadow-sm">



@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
    @endif
  <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Liste des commandes terminées</h3>

  <div class="">

    @if(session()->has("successDelete"))
    <div class="alert alert-success">
      <h4>{{session()->get('successDelete')}}</h4>
    </div>
    @endif
    <div class="col-12 d-flex justify-content-center"><div class="etcmd col-8 d-flex justify-content-center"><strong>Liste des tâches effectuées</strong></div></div>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" class="milieu">N°</th>
          <th scope="col" class="milieu">name</th>
          <th scope="col" class="milieu">Prenom</th>
          <th scope="col" class="milieu">Telephone</th>
          <th scope="col" class="milieu">Date de la commande</th>
          <th scope="col" class="milieu">Nom de l'employé</th>
          <th style="width: 350px;" class="milieu" scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $compteur = 0;

        ?>
        @foreach($commandes as $commande)
        <?php $compteur++; ?>

        <tr>
          <th class="milieu" scope="row"><strong> {{ $loop->index + 1 }} </strong></th>
          <td>{{ $commande->panier->user->name }}</td>
          <td>{{ $commande->panier->user->prenom }}</td>
          <td class="milieu">{{ $commande->panier?->user->contact }}</td>
          <td class="milieu">{{ $commande->updated_at->format('d-m-Y') }}</td>
          <td>{{ $commande->couturier->name }} {{ $commande->couturier->Prenom }}</td>
          <td class="centrr"><a href="{{route('admin.commande.cmdenvoyer', $commande->id)}}" class="btn btn-info">Envoyer</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <br><br><br><br>

   <div class="col-12 d-flex justify-content-center"><div class="etatcmd col-8 d-flex justify-content-center"><strong>Liste des tâches validées</strong></div></div> 
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" class="milieu">N°</th>
          <th scope="col" class="milieu">name</th>
          <th scope="col" class="milieu">Prenom</th>
          <th scope="col" class="milieu">Telephone</th>
          <th scope="col" class="milieu">Date de la commande</th>
          <th scope="col" class="milieu">Nom de l'employé</th>
          <th style="width: 350px;" class="milieu" scope="col">Etat de la commande</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $compteur = 0;

        ?>
        @foreach($commandess as $commandes)
        <?php $compteur++; ?>

        <tr>
          <th class="milieu" scope="row"><strong> {{ $loop->index + 1 }} </strong></th>
          <td>{{ $commandes->panier->user->name }}</td>
          <td>{{ $commandes->panier->user->prenom }}</td>
          <td class="milieu">{{ $commandes->panier?->user->contact }}</td>
          <td class="milieu">{{ $commandes->updated_at->format('d-m-Y') }}</td>
          <td>{{ $commandes->couturier->name }} {{ $commandes->couturier->Prenom }}</td>
          <td class="centrr"><p class="ecris">Terminer</p></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>

@endsection