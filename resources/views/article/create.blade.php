<div class="container">
    <h1 class="mt-4">Créer un Nouvel Article</h1>

    <form action="{{ route('article.store') }}" method="POST">
        @csrf <!-- Protection contre les attaques CSRF -->

        <div class="mb-3">
            <label for="titre" class="form-label">Titre de l'Article</label>
            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror"
                value="{{ old('titre') }}" required>
            @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sous_titre" class="form-label">Sous-titre</label>
            <input type="text" name="sous_titre" id="sous_titre"
                class="form-control @error('sous_titre') is-invalid @enderror" value="{{ old('sous_titre') }}" required>
            @error('sous_titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea name="contenu" id="contenu" rows="5" class="form-control @error('contenu') is-invalid @enderror"
                required>{{ old('contenu') }}</textarea>
            @error('contenu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (URL)</label>
            <input type="text" name="image" id="image"
                class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Vidéo (URL)</label>
            <input type="text" name="video" id="video"
                class="form-control @error('video') is-invalid @enderror" value="{{ old('video') }}" required>
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'Article</button>
        <a href="{{ route('article.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
