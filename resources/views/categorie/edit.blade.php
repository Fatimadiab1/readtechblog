<h1>Modifier la catégorie</h1>
<form action="{{ route('categorie.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="image">Image</label>
    @if ($categories->image)
        <p>Image actuelle : <img src="{{ asset('storage/' . $categories->image) }}" width="100" alt="Image actuelle"></p>
    @endif
    <input type="file" name="image" id="image" accept="image/*">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="{{ $categories->nom }}" required>

    <label for="description">Description :</label>
    <input type="text" name="description" value="{{ $categories->description }}" required>

    <button type="submit">Enregistrer</button>
</form>
