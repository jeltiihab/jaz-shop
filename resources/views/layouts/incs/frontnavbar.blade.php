<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">JAZ-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{'/'}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('category')}}">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('login')}}">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('register')}}">S'inscrire</a>
                </li>
            </ul>
        </div>
    </div>
</nav>