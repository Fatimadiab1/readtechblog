<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pays->nom }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    {{-- HEADER --}}
    <header class="bg-black text-white py-10">
        <h1 class="text-center text-4xl">{{ $pays->nom }}</h1>
    </header>

    {{-- Evenement dans le pays --}}
    <section class="py-10">
        {{-- <h2 class="text-center text-3xl">Evenement dans le pays "{{ $evenement->nom }}"</h2> --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 mt-6">
            @foreach ($pays->evenements as $evenement)
                <div class="p-4 border shadow">
                    <h3 class="text-lg font-bold">{{ $evenement->contenu }}</h3>
                    <p class="mt-2">{{($evenement->image) }}</p>
                </div>
            @endforeach
        </div>
    </section>
</body>

</html>
