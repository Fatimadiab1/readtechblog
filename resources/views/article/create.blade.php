<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Nouvel Article</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="flex min-h-screen">
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

        <main class="flex-grow">
            {{-- Barre du haut --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Créer un Nouvel Article</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>

            {{-- Form pour crée articles --}}
            <div class="bg-white shadow-lg rounded-lg p-4 m-3 space-y-4">
                <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-col">
                        <label for="titre" class="text-lg font-medium">Titre de l'Article :</label>
                        <input type="text" name="titre" value="{{ old('titre') }}" required
                            class="border px-4 py-1 rounded-lg @error('titre') border-red-500 @enderror">
                        @error('titre')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="description" class="text-lg font-medium">Description :</label>
                        <input type="text" name="description" value="{{ old('description') }}" required
                            class="border px-4 py-1 rounded-lg @error('description') border-red-500 @enderror">
                        @error('description')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="sous_titre" class="text-lg font-medium">Sous-titre :</label>
                        <input type="text" name="sous_titre" value="{{ old('sous_titre') }}" required
                            class="border px-4 py-1 rounded-lg @error('sous_titre') border-red-500 @enderror">
                        @error('sous_titre')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="contenu" class="text-lg font-medium">Contenu :</label>
                        <textarea name="contenu" required class="border px-4 py-1 rounded-lg @error('contenu') border-red-500 @enderror">{{ old('contenu') }}</textarea>
                        @error('contenu')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="image" class="text-lg font-medium">Image :</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="border px-4 py-1 rounded-lg @error('image') border-red-500 @enderror">
                        @error('image')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="video" class="text-lg font-medium">Vidéo :</label>
                        <input type="file" name="video" id="video" accept="video/*"
                            class="border px-4 py-1 rounded-lg @error('video') border-red-500 @enderror">
                        @error('video')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="category_id" class="text-lg font-medium">Catégorie :</label>
                        <select name="category_id" required
                            class="border px-4 py-1 rounded-lg @error('category_id') border-red-500 @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-500 py-2 rounded-lg mt-2 text-white transition duration-500">
                        Créer l'Article
                    </button>
                </form>
            </div>
        </main>
    </div>

</body>

</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
