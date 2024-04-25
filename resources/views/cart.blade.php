
@extends('Master_page')

@section('title', 'Cart')

@section('content')
                @include('incs.flash')

    <table id="cart" class="table table-hover table-condensed" border="1">
        <thead>
        <tr>
            <th style="width:50%">Produits</th>
            <th style="width:10%">Prix</th>
            <th style="width:8%">Quantite</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>
<!-- by this code session get all product that user chose -->
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['prix'] * $details['quantite'] ?>

                <tr>
                    <td data-th="produit">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$details['image']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['nom'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="prix">{{ $details['prix'] }} DH</td>
                    <td data-th="quantite">
                        <input type="number" value="{{ $details['quantite'] }}" class="form-control quantite" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['prix'] * $details['quantite'] }} DH</td>
                    <td class="actions" data-th="">
                    <!-- this button is to update card -->
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Modifier</button>
                       <!-- this button is for update card -->
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>

        <tr>
            <td>
                <form action="/session" method="POST">
                    @csrf
                    <a href="{{ url('/home') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type='hidden' name="total" value="{{ $total }}">
                    <input type='hidden' name="nom" value="{{ $details['nom'] }}">
                    <input type='hidden' name="quantite" value="{{ $details['quantite'] }}">
                    <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                </form>

            </td>
            <td>
                {{$total}}
            </td>

        </tr>
        </tfoot>
    </table>

@endsection


@section('scripts')
<script>



// this function is for update card
        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantite: ele.parents("tr").find(".quantite").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Vous etes sur de suprimer cette commande")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection


