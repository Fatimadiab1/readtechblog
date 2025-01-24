<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Nouvel Événement</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
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

        <main class="flex-grow">
            {{-- Barre du haut --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Créer un Nouvel Événement</h1>
            </header>
            {{-- Form pour cree des evenements --}}
            <div class="bg-white shadow-lg rounded-lg p-2 m-2">
                <form action="{{ route('evenement.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="nom" class="block text-md font-medium mb-1">Titre de l'Événement</label>
                        <input type="text" name="nom" id="nom"
                            class="w-full p-2 mt-2 border rounded-md @error('nom') border-red-500 @enderror"
                            value="{{ old('nom') }}" required>
                        @error('nom')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-md font-medium mb-1">Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full p-2 mt-1 border rounded-md @error('image') border-red-500 @enderror">
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="contenu" class="block text-md font-medium ">Contenu</label>
                        <textarea name="contenu" id="contenu" rows="3"
                            class="w-full p-2 mt-1 border rounded-md @error('contenu') border-red-500 @enderror" required>{{ old('contenu') }}</textarea>
                        @error('contenu')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-md font-medium ">Date</label>
                        <input type="date" name="date" id="date"
                            class="w-full p-2 mt-1 border rounded-md @error('date') border-red-500 @enderror"
                            value="{{ old('date') }}" required>
                        @error('date')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pays_id" class="block text-md font-medium mb-1">Pays</label>
                        <select name="pays_id" id="pays_id"
                            class="w-full p-2 mt-1 border rounded-md @error('pays_id') border-red-500 @enderror">
                            @foreach ($pays as $payss)
                                <option value="{{ $payss->id }}"
                                    {{ old('pays_id') == $payss->id ? 'selected' : '' }}>
                                    {{ $payss->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('pays_id')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-500 py-2 rounded-lg text-white transition duration-500">
                        Créer l'Événement
                    </button>
                </form>
            </div>
        </main>
    </div>

</body>

</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
