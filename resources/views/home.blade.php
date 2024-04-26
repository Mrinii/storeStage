@extends('master_page')
@section('title','Acceuil')
@section('content')
<div class="container">
    <h1 class="text-center">Bienvenue sur notre site e-commerce</h1>
    <p class="text-center">Découvrez nos produits de qualité à des prix compétitifs</p>
    <div class="row">
        @foreach ($produits as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/'.$item['image']) }}" class="card-img-top" alt="Product Image" style="height: 200px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['nom'] }}</h5>
                    <p class="card-text">{{ $item['prix'] }} dh</p>
                    <p class="card-text">{{ $item['categorie'] }}</p>
                    <a href="{{ url('cart/addc', ['id' => $item['id']]) }}" class="btn btn-block btn-dark">Ajouter au panier</a>
                    <a href="/details/{{ $item['id'] }}" class="btn btn-link">Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
