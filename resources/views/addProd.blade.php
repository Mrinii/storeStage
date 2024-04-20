@extends('master_page')
@section('title','ajouter un produit')
@section('content')
<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
<form  method="POST" action="{{route('str')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom">
      @error('nom')
          {{$message}}
      @enderror
    </div>
    <div class="form-group">
      <label for="prix">Prix:</label>
      <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrez le prix">
      @error('prix')
          {{$message}}
      @enderror
    </div>
    <div class="form-group">
      <label for="categorie">Catégorie:</label>
      <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Entrez la catégorie">
      @error('categorie')
          {{$message}}
      @enderror
    </div>


    <div class="form-group">
        <label for="description">Description:</label>
        <input type="textarea" class="form-control" id="description" name="description" placeholder="Entrez la description">
        @error('description')
            {{$message}}
        @enderror
    </div>



    <div class="form-group">
        <label for="taillesdesponibles">Tailles Desponibles:</label>
        <input type="text" class="form-control" id="taillesdesponibles" name="taillesdesponibles" placeholder="Entrez les tailles desponibles">
        @error('taillesdesponibles')
            {{$message}}
        @enderror
    </div>


    <div class="form-group">
      <label for="image">Image de produit:</label>
      <input type="file" class="form-control-file" id="image" name="image" >
    </div>
    <button type="submit" class="btn btn-primary">Ajouter le produit</button>
  </form>
@endsection






<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>