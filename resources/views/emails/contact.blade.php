<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 700px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(90deg, #0056b3, #008cff);
            color: #ffffff;
            text-align: center;
            padding: 30px 20px;
            font-size: 28px;
            font-weight: bold;
        }

        .content {
            padding: 30px;
            text-align: left;
            line-height: 1.6;
        }

        .content p {
            margin: 15px 0;
            font-size: 16px;
            color: #555;
        }

        .content strong {
            color: #0056b3;
        }

        .content .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #008cff;
            font-style: italic;
        }

        .footer {
            background-color: #f4f4f4;
            color: #777;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            border-top: 1px solid #ddd;
        }

        .footer a {
            color: #008cff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            Nouveau message de contact
        </div>

        <!-- Content -->
        <div class="content">
            <p><strong>Nom :</strong> {{ $nom }}</p>
            <p><strong>Prénom :</strong> {{ $prenom }}</p>
            <p><strong>E-mail :</strong> {{ $email }}</p>
            <div class="message">
                <p><strong>Message :</strong></p>
                <p>{{ $content }}</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            Cet e-mail a été généré automatiquement par <strong>ReadTechBlog</strong>. <br>
            &copy; 2025 ReadTechBlog. Tous droits réservés. | <a href="https://readtechblog.com">Site Web</a>
        </div>
    </div>
</body>

</html>
