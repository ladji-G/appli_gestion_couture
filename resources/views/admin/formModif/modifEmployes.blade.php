@extends('couturier.layouts.app')
@section('couturier')

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
    <form style="width:75%" class="form" method="Post" action="{{route('admin.employe.update', ['employe'=>$couturiers->id])}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Nom</strong></label>
            <input type="text" class="form-control" name="Nom" value="{{$couturiers->Nom}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Prenom</strong></label>
            <input type="text" class="form-control" name="Prenom" value="{{$employe->Prenom}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Adresse</strong></label>
            <input type="text" class="form-control" name="adresse" value="{{$employe->adresse}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Telephone</strong></label>
            <input type="text" class="form-control" name="telephone" value="{{$employe->telephone}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Email</strong></label>
            <input type="text" class="form-control" name="email" value="{{$employe->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Specialite</strong></label>
            <input type="text" class="form-control" name="position" value="{{$employe->specialite}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Salaire horaire</strong></label>
            <input type="text" class="form-control" name="salaire_horaire" value="{{$employe->salaire_horaire}}">
        </div>
        <div class="mb-3">
        <label for="formFileSm" class="form-label"><strong>choisir une image</strong></label>
        <input class="form-control " id="formFileSm" type="file" name="image" value="">
        </div>
    <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
    <a href="{{route('admin.employe')}}" class="btn btn-danger">Annuler</a>
    </form>
        
    </div>
    
    
  </div>
  
  @endsection