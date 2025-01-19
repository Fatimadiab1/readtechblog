<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .container {
            width: 400px;  
            padding: 10px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        h2 {
            font-size: 12px;  
            color: black;
            text-align: center;
            margin-bottom: 10px;
        }

        .form-label {
            color: black;
            font-size: 10px; 
        }

        .form-control {
            height: 20px; 
            font-size: 10px;  
            margin-bottom: 8px;  
        }

        .btn-primary {
            width: 100%;
            height: 25px;  
            font-size: 10px;  
        }

        .logo {
            width: 130px;  
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <img src="{{ asset('img/readtechblacklogo.png') }}" alt="Logo" class="logo">
        <h2>Inscription</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div>
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div>
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div>
                <label for="address" class="form-label">Adresse</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div>
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation" class="form-label">Confirmer</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
</html>
