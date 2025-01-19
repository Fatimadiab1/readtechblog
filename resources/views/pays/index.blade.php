<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="flex h-screen">
         {{-- sidebar --}}
         <aside class="w-64 bg-blue-600 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">Dashboard</div>
            <nav class="flex-grow">
                <ul>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500 ">
                        <a href="#" class="flex items-center">
                            <span class=" text-md font-medium">Accueil</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('admin.index')}}" class="flex items-center">
                            <span class="text-md font-medium">Administrateurs</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="#" class="flex items-center">
                        <span class="text-md font-medium">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="{{ route('categorie.index') }}" class="flex items-center">
                        <span class="text-md font-medium">Catégories</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="#" class="flex items-center">
                        <span class="text-md font-medium">Articles</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                        <a href="#" class="flex items-center">
                        <span class="text-md font-medium">Evènements</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-6">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="w-full bg-red-600 hover:bg-red-500 py-2 rounded transition duration-500">Déconnexion</button>
                </form>
            </div>
        </aside>

        <main class="flex-grow ">
            {{-- Top Bar --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Liste des pays</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>

            {{-- Success Alert --}}
            @if(session('success'))
                <div class="alert alert-success mb-4 max-w-lg mx-auto bg-green-100 text-green-800 p-4 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table of Articles --}}
            <section class="m-4">
                <div class="flex justify-between mb-3">
                    <a href="{{ route('pays.create') }}" class="btn btn-success text-white bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg">Ajouter un nouveau pays</a>
                </div>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                    <table class="table-auto w-full text-sm text-left text-gray-700">
                        <thead class="bg-blue-800 text-white">
                            <tr>
                                <th class="py-3 text-center"></th>
                                <th class="px-6 py-3">Nom</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pays as $index => $payss)
                                <tr class="hover:bg-blue-100 transition duration-200">
                                    <td class="px-6 py-3 text-center">{{ $index + 1 }}</td>
                                    <td class="px-6 py-3">{{ $payss->nom }}</td>
                                    <td>
                                <form action="{{ route('pays.destroy', $payss->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn text-red-600 py-1 px-4 font-medium hover:text-red-800 transition duration-500"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pays ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-3 text-center text-gray-400">Aucun pays trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

</body>
</html>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
