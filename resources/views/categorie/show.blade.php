@extends('layouts.app')

@section('title', $categorie->nom)
<link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
@section('content')
    <link rel="stylesheet" href="{{ asset('css/categorie.css') }}">
    <style>
  .header-categorie {
    position: relative;
    z-index: 10;
    height: 600px;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-image: url('{{ asset('storage/' . $categorie->image) }}');
    box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.8);
}
    </style>
</head>

<body>


    {{-- HEADER --}}
    <header
    class="header-categorie relative flex items-center justify-center text-white text-center"
    style="background-image: url('{{ asset('storage/' . $categorie->image) }}');">
    <div class="overlay absolute inset-0 bg-black opacity-50"></div>
    <div class="z-10">
        <h1 class="titre">{{ $categorie->nom }}</h1>
    </div>
</header>


{{-- ARTICLES DE LA CATÉGORIE --}}
<p class="titrearticle">Les dernières <span style="color:#008CFF">actualités</span></p>
<section class="firstsection">

    <div class="articles">
        @foreach ($categorie->articles as $article)
            <div class="article-card">

                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->titre }}" class="article-image h-[250px]">


                <h3 class="article-title">{{ $article->titre }}</h3>


                <p class="article-description">{{ Str::limit($article->description, 100) }}</p>


                <a data-aos="fade-up"  href="{{ route('article.show', $article->id) }}" class="article-readmore">
                    Lire plus <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @endforeach
    </div>
</section>
@endsection
</body>
</html>
