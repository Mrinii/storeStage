@extends('master_page')
@section('title','mes a jour des produits')
@section('content')
    <h1>ci la liste des produits</h1>
    <div class="container justify-content-center mt-3">
        @include('incs.flash')
    </div>
            @foreach ($produits as $item)
                <ul>
                    <li><img src="{{asset('images/'.$item['image'])}}" alt="img" width="100"></li>
                    <li>{{$item['nom']}}</li>
                    <li>Prix:{{$item['prix']}} dh</li>
                    <li>Categorie:{{$item['categorie']}}</li>
                    <li>Description:{{$item['description']}}</li>
                    <li>Tailles Desponibles:{{$item['tailles_desponibles']}}</li>
                    <li>
                        <a href="/produits/{{$item['id']}}/edit">Modifier</a>
                        <form action="/produits/{{$item['id']}}" method="POST">
                            @csrf
                            @method('delete')
                
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
                                Supprimer
                            </button>
                
                            <!-- Modal de confirmation -->
                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer cet objet ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            @endforeach



{{-- 
<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script> --}}

@endsection