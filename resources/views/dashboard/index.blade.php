<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Conteneur principal -->
    <div class="flex h-screen">
        <!-- Barre latérale -->
        <aside class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">Dashboard</div>
            <nav class="flex-grow">
                <ul>
                    <li class="px-6 py-3 hover:bg-blue-800">
                        <a href="#" class="flex items-center">
                            <span class="material-icons">dashboard</span>
                            <span class="ml-4">Accueil</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800">
                        <a href="#" class="flex items-center">
                            <span class="material-icons">account_circle</span>
                            <span class="ml-4">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="px-6 py-3 hover:bg-blue-800">
                        <a href="#" class="flex items-center">
                            <span class="material-icons">settings</span>
                            <span class="ml-4">Paramètres</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-6">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="w-full bg-red-500 hover:bg-red-600 py-2 rounded">Déconnexion</button>
                </form>
            </div>
        </aside>

        <!-- Zone de contenu -->
        <main class="flex-grow bg-white">
            <!-- Barre supérieure -->
            <header class="flex justify-between items-center p-4 bg-gray-800 text-white">
                <h1 class="text-xl font-semibold">Tableau de bord</h1>
                <div>
                    <span>Bonjour, Admin</span>
                    <img class="inline-block w-8 h-8 ml-4 rounded-full" src="https://via.placeholder.com/40" alt="Avatar">
                </div>
            </header>

            <!-- Contenu principal -->
            <section class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Carte 1 -->
                    <div class="bg-blue-500 text-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Utilisateurs</h2>
                        <p class="text-2xl font-bold">{{$utilisateur->count()}}</p>
                    </div>
                    <!-- Carte 2 -->
                    <div class="bg-green-500 text-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Articles</h2>
                        <p class="text-2xl font-bold">{{$article->count()}}</p>
                    </div>
                    <!-- Carte 3 -->
                    <div class="bg-yellow-500 text-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Categories</h2>
                        <p class="text-2xl font-bold">{{$categorie->count()}}</p>
                    </div>
                </div>

                <!-- Tableau des données -->
                <div class="mt-6 bg-white rounded shadow">
                    <table class="table-auto w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Rôle</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">

                                <td class="px-4 py-2">

                                </td>
                            </tr>
                            <tr class="border-t">

                                <td class="px-4 py-2">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
