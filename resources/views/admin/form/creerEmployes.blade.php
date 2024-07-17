@extends('admin.layouts.app')
@section('admin')

<div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
    <div class="card-header">
        <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5"><strong> Ajout d'un nouvel employé</strong></h3>
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
        <form style="width:75%" class="form" method="Post" action="{{route('admin.employe.ajouter')}}" enctype="multipart/form-data">
            <div class="row  mb-4 col align-self-center" style="text-align: center; ">
                @csrf
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
                    <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Email</strong></label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Position</strong></label>
                    <input type="text" class="form-control" name="position" value="{{ old('position') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleInputEmail1" class="form-label"><strong>Salaire horaire</strong></label>
                    <input type="text" class="form-control" name="salaire_horaire" value="{{ old('salaire_horaire') }}">
                </div>
                <div class="mb-3 col-6">
                    <label for="formFileSm" class="form-label"><strong>choisi une image</strong></label>
                    <input class="form-control " id="formFileSm" type="file" name="image" value="{{ old('file') }}">
                </div>
                <div class="text-center text-uppercase">
                    <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
                    <a href="{{route('admin.employe')}}" class="btn btn-danger">Annuler</a>
                </div>

            </div>
        </form>

    </div>


</div>

@endsection