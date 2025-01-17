<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $article->titre }}</h1>
            <h4>{{ $article->sous_titre }}</h4>
            <p><strong>Contenu :</strong> {{ $article->contenu }}</p>

            @if ($article->image)
            <div>
                <h5>Image :</h5>
                <img src="{{ asset('storage/' .$article->image  ) }}"
                     alt="Image de l'article"
                     style="max-width: 100%; height: auto;">
            </div>
        @endif
        @if ($article->video)
        <video width="600" controls>
            <source src="{{ asset('storage/' . $article->video) }}" type="video/mp4">
            Votre navigateur ne supporte pas la balise vidéo.
        </video>
        @endif
        <p>Vues : {{ $article->views }}</p>


            @if ($article->category)
                <div>
                    <h5>Catégorie :</h5>
                    <p>{{ $article->category->nom }}</p>
                </div>
            @endif

            <h3>Commentaires</h3>
            @foreach ($article->commentaires as $commentaire)
            @if ($commentaire->user)
                <div class="commentaire">
                    <p>
                        <strong>{{ $commentaire->user->nom }}</strong> : {{ $commentaire->contenue }}
                    </p>
                </div>
            @endif
        @endforeach

            <h4>Ajouter un commentaire</h4>
            <form action="{{ route('commentaire.store') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="contenue" id="contenue" cols="30" rows="5" class="form-control" required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
            </form>

        </div>
    </div>
</div>
