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
        <main class="flex-grow ">
            {{-- Barre du haut --}}
            <header class="flex justify-between items-center p-4 bg-blue-800 text-white">
                <h1 class="text-xl font-semibold">Tableau de bord</h1>
                <div>
                    <span class="text-md font-medium">Bonjour Admin</span>
                </div>
            </header>

        {{-- statistique --}}
            <section class="p-6 ">
                <div class="flex-col justify-around mt-10">
                    <div class="bg-blue-800 shadow-xl text-white p-4 rounded mb-5 w-3/12 ">
                        <div class="flex">
                            <i class="fa-solid fa-user mt-1.5" style="color: #ffffff;"></i>
                            <h2 class="text-lg font-semibold ml-2">Utilisateurs</h2>
                        </div>
                        <p class="text-2xl ">{{$utilisateur->count()}}</p>
                    </div>

                  
                    <div class="bg-blue-700 shadow-xl text-white p-4 rounded  mb-5 w-3/12">
                        <div class="flex">
                            <i class="fa-solid fa-newspaper mt-1.5" style="color: #ffffff;"></i>
                            <h2 class="text-lg font-semibold ml-2">Articles</h2>
                        </div>
                        <p class="text-2xl ">{{$article->count()}}</p>
                    </div>
            
                    <div class="bg-blue-800 shadow-xl text-white p-4 rounded  mb-5 w-3/12">
                        <div class="flex">
                            <i class="fa-solid fa-list mt-1.5" style="color: #ffffff;"></i>
                            <h2 class="text-lg font-semibold ml-2">Catégories</h2>
                        </div>
                        <p class="text-2xl ">{{$categorie->count()}}</p>
                    </div>
                </div>
                
                   <div class="bg-blue-600 shadow-xl text-white p-4 rounded  mb-5 w-3/12 ">
                    <div class="flex">
                        <i class="fa-solid fa-calendar-days mt-1.5" style="color: #ffffff;"></i>
                        <h2 class="text-lg font-semibold ml-2">Evènements</h2>
                    </div>
                    <p class="text-2xl ">{{$evenement->count()}}</p>
                </div>
            </div>
            </section>
        </main>
    </div>
</body>
</html>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
