{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">FullStack Ecom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/produits/electromenager">Electromenager</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/produits/hicking">Hicking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('add')}}">ajouter un produit</a>
        </li>
      </ul>
    </div>
  </nav> --}}








  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">FullStack Ecom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">


    @if(Auth::user())

        @if(Auth::user()->role==='ADMIN')
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('add') }}">Ajouter Un nouveau Produit</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="/espaceadmin">Gestion des produits</a>
                </li>
        @endif
        @if(Auth::user()->role==='USER')
                <li class="nav-item">
                        <a class="nav-link" href="/espaceclient">Espace Client</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/produits/sportifs">Sportifs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/produits/classes">Classes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/produits/sandales">Sandales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/cart">Cart</a>
                </li>
        @endif
        <li class="nav-item active">

            <form action="/logout" method="POST">
                @csrf
            <button type="submit" class="btn" href="/logout">Deconnexion </button>
                </form>
        </li>

    @else
        <li class="nav-item">
            <a class="nav-link" href="/login">Se Connecter</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">S'inscrire</a>
        </li>
    @endif
      </ul>
    </div>
  </nav>
