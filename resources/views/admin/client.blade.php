@extends('admin.layouts.app')
@section('admin')

<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Liste des clients</h3>

  <div class="">


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
          <th scope="col" class="milieu">Date de la commande</th>
          <th style="width: 350px;" class="milieu" scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $compteur = 0;

        ?>
        @foreach($client as $unclient)
        <?php $compteur++; ?>
        <tr>
          <th class="milieu" scope="row"><strong> {{ $loop->index + 1 }} </strong></th>
          <td>{{ $unclient->name }}</td>
          <td>{{ $unclient->prenom }}</td>
          <td class="milieu">{{ $unclient->contact }}</td>
          <td class="milieu">{{ $unclient->created_at->format('d-m-Y') }}</td>
          <td class="milieu"><a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet employé?'))
        {document.getElementById('form-{{$unclient->id}}').submit() }">Supprimer</a>
            <form id="form-{{$unclient->id}}" action="{{route('admin.User.supprimer', $unclient->id)}}" method="post">
              <!-- <a href="#" class="btn btn-blue">Detail</a> -->


              @csrf
              <input type="hidden" name="_method" value="delete">
            </form></a>
          </td>
        </tr>
        @endforeach
      </tbody>
      </tbody>
    </table>
  </div>


</div>

@endsection