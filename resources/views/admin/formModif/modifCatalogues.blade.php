@extends('admin.layouts.app')
@section('admin')

  <div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
  <div class="card-header">
        <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Edition de l'Image</h3>
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
    <form style="width:75%" class="form creercat" method="Post" action="{{route('admin.catalogue.update', ['catalogue'=>$catalogue->id])}}">
    <div class="ima">
    <img src="/storage/{{$catalogue->cover_image}}" class="image img-responsive" alt=""> 
    </div>
    <div class="row  mb-4 col align-self-center" style="text-align: center; ">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="integer" class="form-control" name="Nom" value="{{$catalogue->Nom}}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" name="Desciption" value="{{$catalogue->Desciption}}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" name="Desciption" value="{{$catalogue->PrixEnf}}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" name="Desciption" value="{{$catalogue->PrixAdu}}">
        </div>
        <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file" class="form-control" name="cover_image" value="{{$catalogue->cover_image}}">
        </div>
    <div class="text-center text-uppercase">
        <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
        <a href="{{route('admin.catalogue')}}" class="btn btn-danger">Annuler</a>

    </div>
    </div>
    </form>
        
    </div>
    
    
  </div>

@endsection