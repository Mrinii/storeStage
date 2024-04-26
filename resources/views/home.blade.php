@extends('master_page')
@section('title','Acceuil')
@section('content')
<<<<<<< HEAD
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
=======
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
>>>>>>> 1c3113c659bb14dcdcf7267eb33923823f7a20de
@endsection
