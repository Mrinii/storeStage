@extends('master_page')
@section('title','details de produit')
@section('content')
<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
    <div class="cart">
        <ul>
            <li>
                <img src="{{asset('images/'.$produit['image']) }}" alt="img" width="100">
            </li>
            <li>
                <h2>
                    Nom:
                    {{$produit['nom']}}
                </h2>
            </li>
            <li>
                <p>
                    Categorie:
                    {{$produit['categorie']}}
                </p>
            </li>
            <li>
                <p>
                    Description:
                    {{$produit['description']}}
                </p>
            </li>
            <li>
                <h3>
                    Prix:
                    {{$produit['prix']}}
                    DH
                </h3>

            </li>
            <li>
                <p>
                    Les tailles desponibles :
                    {{$produit['tailles_desponibles']}}
                </p>
            </li>
            <a href="{{ url('cart/addc', ['id' => $produit['id']]) }}" class="btn btn-block text-center text-dark" role="button">Ajouter au cart</a>
            <a href="/back/{{$produit['categorie']}}">Retour</a>
        </ul>
    </div>
@endsection