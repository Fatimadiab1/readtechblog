<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            width: 400px;  
            padding: 10px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
        }

        h2 {
            font-size: 12px;  
            color: black;
            margin-bottom: 10px;
        }

        .btn-primary {
            width: 100%;
            height: 25px;  
            font-size: 10px;  
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
        <h2>Connexion</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
</html>
