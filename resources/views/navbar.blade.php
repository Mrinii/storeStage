<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <a class="navbar-brand" href="/"><img src="/images/final-removebg-preview.png"/></a>
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
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-black">Deconnexion</button>
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
