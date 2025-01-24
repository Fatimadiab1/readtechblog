@extends('layouts.app')

@section('title', $article->titre)
<link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

@section('content')
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
    <section class="sectionarticle">
        <!-- Catégorie de l'article -->
        @if ($article->category)
            <div class="article-category">
                <h4>{{ $article->category->nom }}</h4>
            </div>
        @endif

        <!-- Image de l'article -->
        @if ($article->image)
            <div class="article-image">
                <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article">
            </div>
        @endif

        <!-- Date de création -->
        <div class="article-date">
            <p>{{ $article->created_at->format('d M Y') }}</p>
        </div>

        <!-- Titre de l'article -->
        <div class="article-title">
            <h1>{{ $article->titre }}</h1>
        </div>

        <!-- Sous-titre de l'article -->
        <div class="article-subtitle">
            <h3>{{ $article->sous_titre }}</h3>
        </div>

        <!-- Contenu de l'article -->
        <div class="article-content">
            <p>{{ $article->contenu }}</p>
        </div>
    </section>

    <section class="comment-section">
        <h3 class="comment-title">Commentaires</h3>


        <h4 class="add-comment-title">Ajouter un commentaire</h4>
        <form action="{{ route('commentaire.store') }}" method="POST" class="comment-form">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="contenue" id="contenue" cols="30" rows="5" class="form-control comment-input"
                placeholder="Votre commentaire..." required></textarea>
            <button type="submit" class="btn btn-primary comment-submit">Envoyer</button>
        </form>
        <div class="comments">
            @foreach ($article->commentaires as $commentaire)
                @if ($commentaire->user)
                    <div class="comment">
                        <p class="comment-author">
                            <i class="fas fa-user-circle icon"></i><strong>{{ $commentaire->user->nom }}</strong> :
                        </p>
                        <p class="comment-content">{{ $commentaire->contenue }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section class="related-articles">
        <p class="titrelien">Les articles de la meme <span style="color:#008CFF">catégorie</span></p>
        <div class="related-articles-container">
            @foreach ($article->category->articles->take(3) as $relatedArticle)
                @if ($relatedArticle->id !== $article->id)
                    <!-- Exclure l'article en cours -->
                    <div class="related-article-card">
                        @if ($relatedArticle->image)
                            <img src="{{ asset('storage/' . $relatedArticle->image) }}" alt="{{ $relatedArticle->titre }}"
                                class="related-article-image">
                        @endif
                        <h4 class="related-article-title">{{ $relatedArticle->titre }}</h4>
                        <p class="related-article-description">{{ Str::limit($relatedArticle->description, 80) }}</p>
                        <a data-aos="zoom-in" href="{{ route('article.show', $relatedArticle->id) }}"
                            class="related-article-link">Lire plus -></a>
                    </div>
                @endif
            @endforeach
            <form action="{{ route('articles.like', $article->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-primary d-flex align-items-center">
                    <i class="fas fa-thumbs-up me-2"></i> <!-- Icône du pouce -->
                    <span>J'aime</span>
                    {{-- <span class="badge bg-primary text-white ms-2">{{ $article->likes ?? 0 }}</span> --}}
                    <!-- Nombre de likes -->
                </button>
            </form>
        </div>
        <style>
            .btn-outline-primary {
                border-width: 2px;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .btn-outline-primary:hover {
                background-color: #0d6efd;
                color: white;
            }

            .badge {
                font-size: 0.9rem;
                font-weight: bold;
            }
        </style>
    </section>

    <script>
        document.querySelectorAll('.like-button').forEach(button => {
            button.addEventListener('click', function() {
                const articleId = this.dataset.id;

                fetch(`/articles/${articleId}/like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.textContent = `👍 J'aime (${data.likes})`;
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
            });
        });
    </script>
@endsection
</body>


</html>
