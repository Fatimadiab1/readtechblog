<div class="container">
    <h1 class="mt-4">Créer un Nouvel evenement</h1>

    <form action="{{ route('evenement.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Titre de l'Article</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*">
        @error('image')
            <span>{{ $message }}</span>
        @enderror

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea name="contenu" id="contenu" rows="5" class="form-control @error('contenu') is-invalid @enderror"
                required>{{ old('contenu') }}</textarea>
            @error('contenu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                required value="{{ old('date') }}">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="category_id">Pays</label>
            <select name="pays_id" id="pays_id" class="form-control">
                @foreach ($pays as $payss)
                    <option value="{{ $payss->id }}">{{ $payss->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'Article</button>
        <a href="{{ route('evenement.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
