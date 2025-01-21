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
        {{-- Formulaire d'inscription --}}
        <main class="flex-grow ">
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Créer des administrateurs</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>
            <form action="{{ route('registerAdmin') }}" method="POST"
                class="max-w-5xl m-auto p-2 bg-white shadow-md rounded-md space-y-1 mt-2">
                @csrf
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" required
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot
                        de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirmer le mot de passe" required
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="phone" id="phone" placeholder="Téléphone"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" name="address" id="address" placeholder="Adresse"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 mt-1 px-4 rounded-md hover:bg-blue-600 transition duration-500">
                        Créer Administrateur
                    </button>
                </div>
            </form>

        </main>
    </div>
</body>

</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])