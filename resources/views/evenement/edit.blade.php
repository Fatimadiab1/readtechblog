@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Modifier l'article</h1>
<form action="{{ route('evenement.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nom">Titre :</label>
    <input type="text" name="nom" value="{{ $evenement->nom }}" required>

    <!-- Afficher l'image actuelle et permettre de télécharger une nouvelle image -->
    <label for="image">Image</label>
    @if ($evenement->image)
        <p>Image actuelle : <img src="{{ asset('storage/' . $evenement->image) }}" width="100" alt="Image actuelle">
        </p>
    @endif
    <input type="file" name="image" id="image" accept="image/*">

    <label for="contenu">Contenu :</label>
    <input type="text" name="contenu" value="{{ $evenement->contenu }}" required>

    <label for="date">Date de l'événement :</label>
    <input type="date" id="date" name="date" value="{{ old('date', now()->format('Y-m-d')) }}">
    @error('date')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="pays_id">Pays :</label>
    <select name="pays_id" required>
        @foreach ($pays as $payss)
            <option value="{{ $payss->id }}" {{ $evenement->pays_id == $payss->id ? 'selected' : '' }}>
                {{ $payss->nom }}
            </option>
        @endforeach
    </select>

    <button type="submit">Enregistrer</button>
</form>
