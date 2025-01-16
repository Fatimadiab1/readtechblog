<h1>Modifier l'article</h1>
<form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="titre">Titre :</label>
    <input type="text" name="titre" value="{{ $article->titre }}" required>

    <label for="description">Description :</label>
    <input type="text" name="description" value="{{ $article->description }}" required>

    <label for="sous_titre">Sous-titre :</label>
    <input type="text" name="sous_titre" value="{{ $article->sous_titre }}" required>

    <label for="contenu">Contenu :</label>
    <textarea name="contenu" required>{{ $article->contenu }}</textarea>

    <!-- Afficher l'image actuelle et permettre de télécharger une nouvelle image -->
    <label for="image">Image</label>
    @if ($article->image)
        <p>Image actuelle : <img src="{{ asset('storage/' . $article->image) }}" width="100" alt="Image actuelle"></p>
    @endif
    <input type="file" name="image" id="image" accept="image/*">

    <!-- Afficher la vidéo actuelle et permettre de télécharger une nouvelle vidéo -->
    <label for="video">Vidéo</label>
    @if ($article->video)
        <p>Vidéo actuelle : <a href="{{ asset('storage/' . $article->video) }}" target="_blank">Voir la vidéo</a></p>
    @endif
    <input type="file" name="video" id="video" accept="video/*">

    <label for="category_id">Catégorie :</label>
    <select name="category_id" required>
        @foreach ($categories as $categorie)
            <option value="{{ $categorie->id }}" {{ $article->category_id == $categorie->id ? 'selected' : '' }}>
                {{ $categorie->nom }}
            </option>
        @endforeach
    </select>

    <button type="submit">Enregistrer</button>
</form>
