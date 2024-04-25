@extends('master_page')
@section('title','Acceuil')
@section('content')
<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
<h1 class="text-center">Bienvenue sur notre site e-commerce</h1>
<p class="text-center">Découvrez nos produits de qualité à des prix compétitifs</p>
    @foreach ($produits as $item)
    <ul>
        <li>{{$item['nom']}}</li>
        <li>{{$item['prix']}} dh</li>
        <li>{{$item['categorie']}}</li>
        <li><img src="{{asset('images/'.$item['image'])}}" alt="img" width="100"></li>
        <li>
<a href="{{ url('cart/addc', ['id' => $item['id']]) }}" class="btn btn-block text-center text-dark" role="button">Ajouter au cart</a>
<a href="/details/{{$item['id']}}">Details</a>
        </li>
    </ul>
@endforeach
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>