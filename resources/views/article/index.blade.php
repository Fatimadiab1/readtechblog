
<div class="container">
    <h1 class="mt-4">Liste des Articles</h1>
    <a href="{{ route('article.create') }}" class="btn btn-primary mb-3">Créer un Nouvel Article</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Sous-titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->titre }}</td>
                <td>{{ $article->sous_titre }}</td>
                <td>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
