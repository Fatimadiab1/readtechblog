<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            width: 900px;
            max-width: 95%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-section {
            background: url('{{ asset('img/welc.jpg') }}') no-repeat center center;
            background-size: cover;
        }

        .right-section {
            padding: 20px;
        }

        .form-label {
            color: #555;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .form-control {
            height: 30px;
            font-size: 11px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 8px;
        }

        .form-control:focus {
            border-color: #0066ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        textarea.form-control {
            height: 50px;
            font-size: 11px;
        }

        .btn-primary {
            width: 100%;
            height: 35px;
            font-size: 12px;
            font-weight: bold;
            background-color:#0066ff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #004299;
        }

        h2.text-center {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="main-container">

        <div class="left-section">
        </div>


        <div class="right-section">
            <h2 class="text-center mb-2">Inscription</h2>
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
                <button type="submit" class="btn btn-primary mt-2">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
