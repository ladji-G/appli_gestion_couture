@extends('admin.layouts.app')
@section('admin')


<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Liste des commandes en cours</h3>

  <div class="">
    <div class="d-flex justify-content-end mb-4">
      <a href="{{route('admin.commande.creer')}}" class="btn btn-primary">Attribuer une nouvelle commande</a>
    </div>



    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" class="milieu">N°</th>
          <th scope="col" class="milieu">name</th>
          <th scope="col" class="milieu">Prenom</th>
          <th scope="col" class="milieu">Telephone</th>
          <th scope="col" class="milieu">Date de l'attribution</th>
          <th scope="col" class="milieu">Nom de l'employé</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $compteur = 0;

        ?>
        @foreach($commandes as $commande)
        <?php $compteur++;

        // @dd($commandes);
        if ($commande->panier != NULL) {
        ?>

          <tr>
            <th class="milieu" scope="row"><strong> {{ $loop->index + 1 }} </strong></th>
            <td>{{ $commande->panier->user->name }}</td>
            <td>{{ $commande->panier->user->prenom }}</td>
            <td class="milieu">{{ $commande->panier?->user->contact }}</td>
            <td class="milieu">{{ $commande->created_at->format('d-m-Y') }}</td>
            <td>{{ $commande->couturier->name }} {{ $commande->couturier->Prenom }}</td>
          </tr>
        <?php  } //fin if ($commande  
        ?>
        @endforeach
      </tbody>
    </table>
  </div>


</div>

@endsection