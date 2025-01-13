
<div class="container">
    <h1 class="mt-4">Créer un Nouvel Article</h1>

    <form action="{{ route('categorie.store') }}" method="POST">
        @csrf <!-- Protection contre les attaques CSRF -->

        <div class="mb-3">
            <label for="image" class="form-label">Image (URL)</label>
            <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créer l'Article</button>
        <a href="{{ route('categorie.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
