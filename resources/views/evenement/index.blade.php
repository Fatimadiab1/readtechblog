<div class="container my-5">
    <h1 class="text-center mb-4">Liste des evenements</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('evenement.create') }}" class="btn btn-success px-4 py-2">Créer un Nouvel Article</a>
        @if(session('success'))
            <div class="alert alert-success mb-0" style="max-width: 400px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr class="text-center">
                    <th>#</th>
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Pays</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($evenements as $index => $evenement)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $evenement->nom }}</td>
                        <td><img src="{{ asset('storage/' . $evenement->image) }}" alt="Image" style="width: 50px; height: 50px;"></td>
                        <td>{{ Str::limit($evenement->contenu, 50) }}</td>
                        <td>{{ $evenement->date }}</td>
                        <td>  @if ($evenement->pays)
                                <p>{{ $evenement->pays->nom }}</p>
                        @endif
                </td>
                        <td class="text-center">
                            <a href="{{ route('evenement.edit', $evenement->id) }}" class="btn btn-warning btn-sm me-1">
                                Modifier
                            </a>
                            <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Aucun article trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #007bff;
    }

    .table {
        margin-top: 20px;
        background: #fff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table th {
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn {
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
        border-radius: 5px;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
        color: #212529;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .alert {
        font-size: 0.9rem;
        padding: 0.7rem;
        border-radius: 5px;
    }
</style>
