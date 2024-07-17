@extends('couturier.layouts.app')
@section('couturier')


<div class="my-3 p-3 bg-body rounded shadow-sm " style="text-align: -webkit-center;">
  <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Liste des tâches</h3>

  <div class="w-75">

    @if(session()->has("successDelete"))
    <div class="alert alert-success">
      <h4>{{session()->get('successDelete')}}</h4>
    </div>
    @endif
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" class="milieu">N°</th>
          <th scope="col" class="milieu">image</th>
          <th scope="col" class="milieu">Date d'attribution</th>
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
              <td class="text-center">{{$loop->index + 1 }}</td>
              <td class="text-center">
                  <img src="{{ asset('storage/') }}/{{ $commande->panier['photo'] }}" class="text-center" width="100px" height="100px" alt="">
              </td>
              <td class="text-center">{{$commande->created_at->format('d-m-Y')}}</td>
              <td class="d-flex justify-content-evenly">
                <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle<?= $compteur ?>" role="button">Detail</a>
                <a href="{{route('couturier.tacheterminer',$commande->id)}}" class="btn btn-danger">Terminer</a>
              </td>
            </tr>
               <!-- Début modal -->
            <div class="modal fade" id="exampleModalToggle<?= $compteur ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" style="text-align: center;" id="exampleModalToggleLabel">Details sur la tâche à exécuter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row mt-2">
                            <div class="container">
                              <img src="{{ asset('storage/') }}/{{ $commande->panier['photo'] }}" width="400px" height="400px" alt="">
                            </div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Epaul</label></div>
                            <div class="col-md-6 "><label class="labels">{{ $commande->panier->user->mesure->epaule }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Longeur de la manche</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->long_manche }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Tour de la manche</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->t_manche }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Poitrine</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->poitrine }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Dos</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->dos }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Frappe</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->frappe }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Ceinture</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->ceinture }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">longueur du patalon</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->long_pentalon }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Cuisse</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->cuisse }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Bassin</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->bassin }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Longieur du genoux</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->long_genou }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Bas</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->bas }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Longeur totalle</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->long_totale }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Longueur de la robe</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->long_robe }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Longeur de la jupe</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->long_jupe }}</label></div>
                            <hr>
                            <div class="col-md-6 fw-bold"><label class="labels">Epaule-manche</label></div>
                            <div class="col-md-6"><label class="labels">{{ $commande->panier->user->mesure->epaule_manche }}</label></div>
                            <hr>
                        </div>                
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        





              <!-- <div class="modal-footer">
   

              <!-- Fin du modal -->
              @endforeach
      </tbody>
    </table>
 


</div>


@endsection