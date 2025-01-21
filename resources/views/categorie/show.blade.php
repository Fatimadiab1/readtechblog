<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categorie->nom }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- NAVBAR --}}


    {{-- HEADER --}}
    <header class="bg-black text-white py-10">
        <h1 class="text-center text-4xl">{{ $categorie->nom }}</h1>
        <p class="text-center mt-4">{{ $categorie->description }}</p>
    </header>

    {{-- ARTICLES DE LA CATÉGORIE --}}
    <section class="py-10">
        <h2 class="text-center text-3xl">Articles dans la catégorie "{{ $categorie->nom }}"</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 mt-6">
            @foreach ($categorie->articles as $article)
                <div class="p-4 border shadow">
                    <h3 class="text-lg font-bold">{{ $article->titre }}</h3>
                    <p class="mt-2">{{ Str::limit($article->description, 100) }}</p>
                    <a href="{{ route('article.show', $article->id) }}" class="text-blue-500 mt-4 block">Lire plus</a>
                </div>
            @endforeach
        </div>
    </section>
</body>

</html>
