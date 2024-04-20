@extends('master_page')
@section('title','espace client')
@section('content')
    <h1>ci la liste des produits</h1>
    <div class="container justify-content-center mt-3">
        @include('incs.flash')
    </div>
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




<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

@endsection