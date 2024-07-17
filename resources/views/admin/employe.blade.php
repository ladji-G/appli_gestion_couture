@extends('admin.layouts.app')
@section('admin')

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="entete text-center text-uppercase border-bottom pb-0 mb-0">Liste des employes de l'attelier</h3>

    <div class="">
      <!-- <div class="d-flex justify-content-end mb-4">
        <a href="{{route('admin.employe.creer')}}" class="btn btn-primary">Ajouter un nouvel employe</a>
      </div> -->

      @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h4>{{session()->get('successDelete')}}</h4>
      </div>
      @endif
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col" class="milieu">N°</th>
            <th scope="col" class="milieu">Nom</th>
            <th scope="col" class="milieu">Prenom</th>
            <th scope="col" class="milieu">Telephone</th>
            <th scope="col" class="milieu">Image</th>
            <th style="width: 350px;" scope="col" class="milieu">Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
          $compteur = 0;

          ?>
          @foreach($couturiers as $couturier)
          <?php $compteur++; ?>
          <tr>
            <th class="milieu" scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $couturier->name }}</td>
            <td>{{ $couturier->Prenom }}</td>
            <td class="milieu">{{ $couturier->telephone }}</td>
            <td class="milieu">

              <img class="stable" src="{{ asset('uploads/couturier') }}/{{ $couturier->image }}" width="70px" height="70px" alt="image">
            </td>




            <!-- ************************************************************************************************ -->
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $compteur ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="">
                  <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                      <div class="col-md-5 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle " width="150px" src="{{ asset('uploads/couturier') }}/{{ $couturier->image }}"><span class="font-weight-bold">
                            {{ $couturier->Nom }} {{ $couturier->Prenom }}</span><span class="text-black-50">{{ $couturier->email }}</span><span> </span></div>
                      </div>
                      <div class="col-md-7 border-right">
                        <div class="p-3 py-5">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profil Employe</h4>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-6 fw-bold"><label class="labels">Adresse</label></div>
                            <div class="col-md-6 "><label class="labels">{{ $couturier->adresse }}</label></div>

                            <div class="col-md-6 fw-bold"><label class="labels">Téléphone</label></div>
                            <div class="col-md-6"><label class="labels">{{ $couturier->telephone }}</label></div>

                            <div class="col-md-6 fw-bold"><label class="labels">Position</label></div>
                            <div class="col-md-6"><label class="labels">{{ $couturier->position }}</label></div>

                            <div class="col-md-6 fw-bold"><label class="labels">Salaire Horaire</label></div>
                            <div class="col-md-6"><label class="labels">{{ $couturier->salaire_horaire }}</label></div>


                          </div>


                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- endModel -->

            <!-- ************************************************************************************************ -->



            <td class="d-flex flex-row justify-content-between">
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $compteur ?>">Detail</a>
              <a href="{{ route('admin.employe.edit', $couturier->id) }}" class="btn btn-info">Editer</a>
              <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet employé?'))
              {document.getElementById('form-{{$couturier->id}}').submit() }">Supprimer</a>
              <form id="form-{{$couturier->id}}" action="{{route('couturier.Couturier.supprimer',$couturier->id)}}" method="post">
                <div>
                  <a href="" class="btn btn-info forme">Activer</a>
                  <a href="{{ route('admin.employe.statuts', $couturier->id) }}" class="btn btn-danger forme">Desactiver</a>
                </div>
                <!-- <a href="#" class="btn btn-blue">Detail</a> -->


                @csrf
                <input type="hidden" name="_method" value="delete">
              </form>

            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>


  </div>

@endsection