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
                        <a href="#" class="flex items-center">
                            <span class="text-md font-medium">Accueil</span>
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

        {{-- Barre du haut--}}
        <main class="flex-grow ">
         
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Listes des administrateurs</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>
            {{-- Liste des admins  --}}
            <div class="bg-white shadow-lg rounded-lg p-6 m-3">
                <div class="flex justify-between mb-4">
                    <a href="{{ route('registerAdminForm') }}" class="btn bg-green-600 text-white py-2 px-4 rounded shadow-md hover:bg-green-500 transition duration-300">
                        <i class="fas fa-user-plus"></i> Créer un Admin
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
                            <th class="py-2 px-4 text-left">Prénom</th>
                            <th class="py-2 px-4 text-left">Nom</th>
                            <th class="py-2 px-4 text-left">Email</th>
                            <th class="py-2 px-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr class="border-t">
                                <td class="py-2 px-4">{{ $admin->prenom }}</td>
                                <td class="py-2 px-4">{{ $admin->nom }}</td>
                                <td class="py-2 px-4">{{ $admin->email }}</td>
                                <td class="py-2 flex-col text-center ">
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn  text-green-600 py-1 px-4  font-medium hover:text-green-800 transition duration-500">
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-red-600  py-1 px-4  font-medium hover:text-red-800 transition duration-500" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

    </div>

</body>

</html>
