<div class="container">
    <h1 class="mt-4">Liste des categories</h1>
    <a href="{{ route('categorie.create') }}" class="btn btn-primary mb-3">Créer une Nouvelle categorie</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td><img src="{{ asset('storage/' . $categorie->image) }}" alt="Image" style="width: 50px; height: 50px;"></td>
                    <td>{{ $categorie->nom }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('categorie.destroy', $categorie->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
