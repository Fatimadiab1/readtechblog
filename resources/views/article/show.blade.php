
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $article->titre }}</h1>
                <h4>{{ $article->sous_titre }}</h4>
                <p><strong>Contenu :</strong> {{ $article->contenu }}</p>

                @if($article->image)
                    <div>
                        <h5>Image :</h5>
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article" class="img-fluid">
                    </div>
                @endif

                @if($article->video)
                    <div>
                        <h5>Vidéo :</h5>

                        </video>
                    </div>
                @endif

                @if($article->category_id)
                    <div>
                        <h5>Catégorie :</h5>
                        <p>{{ $article->category_id->nom }}</p>
                    </div>
                @endif

                <a href="{{ route('article.index') }}" class="btn btn-primary">Retour à la liste des articles</a>
            </div>
        </div>
    </div>

