<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
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
            {{-- Barre du haut --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Modifier l'Événement</h1>
            </header>

            <div class="bg-white shadow-lg rounded-lg p-2 m-2">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form pour modification d'évènements --}}
                <form action="{{ route('evenement.update', $evenement->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nom" class="block text-md font-medium mb-2">Titre de l'Événement</label>
                        <input type="text" name="nom" value="{{ $evenement->nom }}"
                            class="w-full p-2 border rounded-md @error('nom') border-red-500 @enderror" required>
                    </div>


                    <div class="mb-4">
                        <label for="image" class="block text-md font-medium mb-2">Image</label>
                        @if ($evenement->image)
                            <p>Image actuelle : <img src="{{ asset('storage/' . $evenement->image) }}" width="100">
                            </p>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full p-2 border rounded-md @error('image') border-red-500 @enderror">
                    </div>

                    <div class="mb-4">
                        <label for="contenu" class="block text-md font-medium mb-2">Contenu</label>
                        <input type="text" name="contenu" value="{{ $evenement->contenu }}"
                            class="w-full p-2 border rounded-md @error('contenu') border-red-500 @enderror" required>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-md font-medium mb-2">Date de l'événement</label>
                        <input type="date" id="date" name="date" value="{{ old('date', $evenement->date) }}"
                            class="w-full p-2 border rounded-md @error('date') border-red-500 @enderror">
                        @error('date')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pays_id" class="block text-md font-medium mb-2">Pays</label>
                        <select name="pays_id"
                            class="w-full p-2 border rounded-md @error('pays_id') border-red-500 @enderror" required>
                            @foreach ($pays as $payss)
                                <option value="{{ $payss->id }}"
                                    {{ $evenement->pays_id == $payss->id ? 'selected' : '' }}>
                                    {{ $payss->nom }}
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