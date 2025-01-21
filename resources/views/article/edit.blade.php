<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
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

        <main class="flex-grow ">
            {{-- Barre du haut --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Modifier l'article</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>

            {{-- Form de Modification d'article --}}
            <div class="bg-white shadow-lg rounded-lg p-6  space-y-4">
                <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col">
                        <label for="titre" class="text-lg font-medium">Titre :</label>
                        <input type="text" name="titre" value="{{ $article->titre }}" required
                            class="border px-4 py-1 rounded-lg">
                    </div>

                    <div class="flex flex-col">
                        <label for="description" class="text-lg font-medium">Description :</label>
                        <input type="text" name="description" value="{{ $article->description }}" required
                            class="border px-4 py-1 rounded-lg">
                    </div>

                    <div class="flex flex-col">
                        <label for="sous_titre" class="text-lg font-medium">Sous-titre :</label>
                        <input type="text" name="sous_titre" value="{{ $article->sous_titre }}" required
                            class="border px-4 py-1 rounded-lg">
                    </div>

                    <div class="flex flex-col">
                        <label for="contenu" class="text-lg font-medium">Contenu :</label>
                        <textarea name="contenu" required class="border px-4 py-1 rounded-lg">{{ $article->contenu }}</textarea>
                    </div>

                    <div class="flex flex-col">
                        <label for="image" class="text-lg font-medium">Image :</label>
                        @if ($article->image)
                            <p>Image actuelle : <img src="{{ asset('storage/' . $article->image) }}" width="100"
                                    alt="Image actuelle"></p>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                            class="border px-4 py-1 rounded-lg">
                    </div>

                    <div class="flex flex-col">
                        <label for="video" class="text-lg font-medium">Vidéo :</label>
                        @if ($article->video)
                            <p>Vidéo actuelle : <a href="{{ asset('storage/' . $article->video) }}" target="_blank"
                                    class="text-blue-500">Voir la vidéo</a></p>
                        @endif
                        <input type="file" name="video" id="video" accept="video/*"
                            class="border px-4 py-1 rounded-lg">
                    </div>

                    <div class="flex flex-col">
                        <label for="category_id" class="text-lg font-medium">Catégorie :</label>
                        <select name="category_id" required class="border px-4 py-1 rounded-lg">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    {{ $article->category_id == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-500 py-2 rounded-lg text-white transition duration-500">
                        Enregistrer
                    </button>
                </form>
            </div>
        </main>
    </div>

</body>

</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])