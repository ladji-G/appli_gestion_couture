@extends('admin.layouts.app')
@section('admin')

<div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
    <div class="card-header">
        <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5"><strong>Ajout d'une nouvelle perssonne</strong></h3>
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

        <!-- <?php
                foreach ($listeClient as $key => $UnClient) {
                    echo $UnClient->genre . " " . $UnClient->Nom . " " . $UnClient->Prenom . " " . $UnClient->adresse . " " .
                        $UnClient->telephone . " " . $UnClient->email . " " . $UnClient->date_dernier_commande . "<br><br>";
                }
                ?> -->


        <form style="width:75%" class="form" method="Post" action="{{route('admin.client.ajouter')}}">
            <div class="row  mb-4 col align-self-center" style="text-align: center; ">
                @csrf
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Genre</strong></label>
                    <select name="genre" id="" class="form-control">
                        <option value="">Cliquez pour choisir</option>
                        <option value="H">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Nom</strong></label>
                    <input type="text" class="form-control" name="Nom" value="{{ old('Nom') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Prenom</strong></label>
                    <input type="text" class="form-control" name="Prenom" value="{{ old('Prenom') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Adresse</strong></label>
                    <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Telephone</strong></label>
                    <input type="integer" class="form-control" name="telephone" value="{{ old('telephone') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Email</strong></label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Date de la dernière commande</strong></label>
                    <input type="date" class="form-control" name="date_dernier_commande" value="{{ old('date_dernier_commande') }}">
                </div>
                <div class="text-center text-uppercase">
                    <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
                    <a href="{{route('admin.client')}}" class="btn btn-danger">Annuler</a>
                </div>

            </div>
        </form>

    </div>


</div>

@endsection