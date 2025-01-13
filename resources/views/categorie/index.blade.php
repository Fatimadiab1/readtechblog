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
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{ $categorie->image }}</td>
                    <td>{{ $categorie->nom }}</td>
                    <td>{{ $categorie->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
