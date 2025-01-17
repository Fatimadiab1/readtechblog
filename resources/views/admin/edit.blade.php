<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex h-screen">
        {{-- Side bar --}}
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
                        <a href="#" class="flex items-center">
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

        <main class="flex-grow bg-white">
            <!-- Barre supérieure -->
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Modifier Admin</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>

            <!-- Formulaire de modification d'admin -->
            <div class=" max-w-6xl mx-auto bg-white p-3 mt-1.5 rounded-lg shadow-lg">
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nom -->
                    <div class="mb-1">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                        <input type="text" name="nom" value="{{ old('nom', $admin->nom) }}" required
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('nom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Prénom -->
                    <div class="mb-1">
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom :</label>
                        <input type="text" name="prenom" value="{{ old('prenom', $admin->prenom) }}" required
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('prenom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                        <input type="email" name="email" value="{{ old('email', $admin->email) }}" required
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe (laisser vide pour ne pas changer) :</label>
                        <input type="password" name="password"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="mb-1">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe :</label>
                        <input type="password" name="password_confirmation"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-1">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone :</label>
                        <input type="text" name="phone" value="{{ old('phone', $admin->phone) }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Adresse -->
                    <div class="mb-1">
                        <label for="address" class="block text-sm font-medium text-gray-700">Adresse :</label>
                        <input type="text" name="address" value="{{ old('address', $admin->address) }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Bouton d'enregistrement -->
                    <div class="mt-2">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-500 text-white py-3 rounded-md transition duration-300">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
