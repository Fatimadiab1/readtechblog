<div class="container">
    <h1 class="mt-4">Ajouter un nouveau pays</h1>

    <form action="{{ route('pays.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du pays</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créer le pays</button>
        <a href="{{ route('pays.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
