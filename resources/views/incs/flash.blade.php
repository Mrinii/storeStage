@if ($message = Session::get('successadd'))
@if ($produit =  Session::get('produit'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}:{{$produit}}</strong>
</div> 
@endif 
@endif
@if ($message = Session::get('successupdate') )
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>   
@endif
@if ($message = Session::get('produitdeleted'))
@if ( $produit = Session::get('produit'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}:{{$produit}}</strong>
</div>   
@endif
@endif

{{-- @if ($quantite = Session::get('quantite')) --}}
{{-- @if ($produit = Session::get('produit')) --}}
@if ( $message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>   
@endif
{{-- @endif --}}
{{-- @endif --}}

{{-- 
@if ($message = Session::get('success'))
@if ($produit = Session::get('produit') )
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$produit}}:{{$message}}</strong>
</div>   
@endif
@endif --}}


