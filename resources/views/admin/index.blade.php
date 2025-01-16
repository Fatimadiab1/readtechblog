<div class="container">
    <h1 class="mt-4">Liste des categories</h1>
    <a href="{{ route('registerAdminForm') }}" class="btn btn-primary mb-3">Créer une Nouvelle categorie</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->prenom }}</td>
                    <td>{{ $admin->nom }}</td>
                    <td>{{ $admin->email }}</td>

                <td class="text-center">
                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm me-1">
                        Modifier
                    </a>
                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                        Supprimer
                    </button>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
