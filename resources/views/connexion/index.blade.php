<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            height: 100vh;
        }

        .main-container {
            width: 800px;
            max-width: 95%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 15px;
        }

        .left-section {
            background: url('{{ asset('img/welc2.jpg') }}') no-repeat center center;
            background-size: cover;
            background-position: center;


        }

        .right-section {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .form-label {
            color: #555;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .form-control {
            height: 30px;
            font-size: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .form-control:focus {
            border-color: #0066ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        .btn-primary {
            width: 100%;
            height: 35px;
            font-size: 12px;
            font-weight: bold;
            background-color: #0066ff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color:#004299;
        }

        img.logo {
            width: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Section gauche -->
        <div class="left-section">
            <!-- Image ajoutée via CSS -->
        </div>

        <!-- Section droite -->
        <div class="right-section">

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
    </div>
</body>
</html>
