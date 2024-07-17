@extends('admin.layouts.app')
@section('admin')

    <div class="formulaire my-3 p-3 bg-body rounded shadow-sm">
        <div class="card-header">
            <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Ajout d'une nouvelle image</h3>
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
            <div>
                <form class="form creercat" style="width:90%" method="Post" action="{{route('admin.catalogue.ajouter')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label"><strong>Genre</strong></label>
                        <select name="genre" id="" class="form-control">
                            <option value="">Cliquez pour choisir le genre</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label"><strong>
                                <h4>Nom</h4>
                            </strong></label>
                        <input type="text" class="form-control" name="Nom" value="{{ old('Nom') }}">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label"><strong>
                                <h4>Prix pour enfant :</h4>
                            </strong></label>
                        <input type="text" class="form-control" name="PrixEnf" value="{{ old('PrixEnf') }}">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label"><strong>
                                <h4>Prix pour adulte :</h4>
                            </strong></label>
                        <input type="text" class="form-control" name="PrixAdu" value="{{ old('PrixAdu') }}">
                    </div>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <textarea class="ranger" style="width: 60%;" name="Desciption" value="{{ old('Desciption') }}" placeholder="Entrer votre Description" rows="10"></textarea>
                    </div>
                    <div class="mb-3 col-12">
                        <label for="formFileSm" class="form-label"><strong>
                                <h4>choisi une image</h4>
                            </strong></label>
                        <input class="form-control " id="formFileSm" type="file" name="cover_image" value="{{ old('cover_image') }}">
                    </div>
                    <div class="text-center text-uppercase">
                        <button type="submit" class="enregistrer btn btn-primary">Enregistrer</button>
                        <a href="{{route('admin.catalogue')}}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>


            </div>


        </div>
    </div>

@endsection