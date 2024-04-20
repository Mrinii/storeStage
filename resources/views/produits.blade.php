@extends('master_page')
@section('title','produits');
@section('content')
    <h1>ci la liste des produits de categorie {{$cat}}</h1>
    <div class="container justify-content-center mt-3">
        @include('incs.flash')
    </div>
            @foreach ($tab as $item)
                <ul>
                    <li><img src="{{asset('images/'.$item['image'])}}" alt="img" width="100"></li>
                    <li>{{$item['nom']}}</li>
                    <li>{{$item['prix']}} dh</li>
                    <li>{{$item['categorie']}}</li>
                    <li>{{$item['description']}}</li>
                    <li>{{$item['tailles_desponibles']}}</li>
                    <li>
                            <a href="{{ url('cart/addc', ['id' => $item['id']]) }}" class="btn btn-block text-center text-dark" role="button">Add to cart</a>
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
