
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-5">
    <div class="text-center">
        <h1>Bienvenue sur notre site</h1>

        @guest
            <div class="mt-4">
                <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
                <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>
            </div>
        @else
            <div class="mt-4">
                <span>Bienvenue, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>
            </div>
        @endguest
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
