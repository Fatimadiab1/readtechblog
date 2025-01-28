<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez ReadTechBlog</title>
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
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
            text-align: center;
            line-height: 1.8;
        }

        .content p {
            margin: 20px 0;
            font-size: 18px;
            color: #555;
        }

        .content strong {
            color: #0056b3;
        }

        .cta-button {
            display: inline-block;
            margin: 30px 0;
            padding: 15px 25px;
            background: #008cff;
            color: #ffffff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 140, 255, 0.4);
        }

        .cta-button:hover {
            background: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 86, 179, 0.5);
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
            Bienvenue chez ReadTechBlog
        </div>

        <!-- Content -->
        <div class="content">
            <p>Bonjour <strong>{{ $prenom }}</strong>,</p>
            <p>Merci de nous avoir contactés ! Nous sommes ravis de vous accueillir parmi notre communauté passionnée de technologie.</p>
            <p>Explorez des articles, guides et actualités qui vous inspireront et vous aideront à découvrir l'univers de l'innovation.</p>
        </div>

    
        
       <!-- Footer -->
       <div class="footer">
        Cet e-mail a été généré automatiquement par <strong>ReadTechBlog</strong>. <br>
        &copy; 2025 ReadTechBlog. Tous droits réservés. | <a href="https://readtechblog.com">Site Web</a>
    </div>
    </div>
</body>

</html>

