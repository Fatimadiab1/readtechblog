<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Evenements</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-blue-600 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">Dashboard</div>
            <nav class="flex-grow">
                <ul>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500 ">
                        <a href="{{ route('dashboard') }}" class="flex items-center">
                            <span class=" text-md font-medium">Accueil</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('admin.index') }}" class="flex items-center">
                            <span class="text-md font-medium">Administrateurs</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('client') }}" class="flex items-center">
                            <span class="text-md font-medium">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('categorie.index') }}" class="flex items-center">
                            <span class="text-md font-medium">Catégories</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('article.index') }}" class="flex items-center">
                            <span class="text-md font-medium">Articles</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('evenement.index') }}" class="flex items-center">
                            <span class="text-md font-medium">Evènements</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="" class="flex items-center">
                            <span class="text-md font-medium">Commentaires</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-6">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button
                        class="w-full bg-red-600 hover:bg-red-500 py-2 rounded transition duration-500">Déconnexion</button>
                </form>
            </div>
        </aside>


        <main class="flex-grow">

            {{-- Barre du haut  --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Liste des Evenements</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>

            {{-- Liste des évènements --}}
            <div class="bg-white shadow-lg rounded-lg p-6 m-3">
                <div class="flex  mb-4">
                    <a href="{{ route('evenement.create') }}"
                        class="btn bg-green-600 text-white py-2 px-4 rounded shadow-md hover:bg-green-500 transition duration-300">
                        <i class="fas fa-plus"></i> Créer un Nouvel Evenement
                    </a>
                    <a href=""
                    class="btn bg-green-600 ml-2 text-white py-2 px-4 rounded shadow-md hover:bg-red-500 transition duration-300">
                    <i class="fas fa-comments"></i> Gestion des Commentaires
                </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full bg-white border-collapse shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-blue-800 text-white">
                            <th class="py-2 px-4 text-left">Titre</th>
                            <th class="py-2 px-4 text-left">Image</th>
                            <th class="py-2 px-4 text-left">Contenu</th>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Pays</th>
                            <th class="py-2 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($evenements as $index => $evenement)
                            <tr class="border-t">
                                <td class="py-2 px-4">{{ $evenement->nom }}</td>
                                <td class="py-2 px-4">
                                    <img src="{{ asset('storage/' . $evenement->image) }}" alt="Image"
                                        class="w-12 h-12 object-cover rounded-full">
                                </td>
                                <td class="py-2 px-4">{{ Str::limit($evenement->contenu, 50) }}</td>
                                <td class="py-2 px-4">{{ $evenement->date }}</td>
                                <td class="py-2 px-4">
                                    @if ($evenement->pays)
                                        <p>{{ $evenement->pays->nom }}</p>
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-center">
                                    <a href="{{ route('evenement.edit', $evenement->id) }}"
                                        class="btn text-yellow-600 py-1 px-4 font-medium hover:text-yellow-800 transition duration-500">
                                        Modifier
                                    </a>
                                    <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn text-red-600 py-1 px-4 font-medium hover:text-red-800 transition duration-500"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet évènement ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-sm text-gray-500 py-4">Aucun évènement
                                    trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>

    </div>
    
</body>

</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


