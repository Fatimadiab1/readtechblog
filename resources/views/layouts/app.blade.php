<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- En-tête (header) commun à toutes les pages -->
    @include('layouts.header')

    <!-- Contenu de la page -->
    <main>
        @yield('content')
    </main>

    <!-- Pied de page (footer) commun à toutes les pages -->
    @include('layouts.footer')
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 500,
        once: true,
    });
</script>
<script src="{{ asset('js/nav.js') }}"></script>
