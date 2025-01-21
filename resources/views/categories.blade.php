<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/categorie.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">


</head>
<body>
    {{-- NAVBAR --}}
    <nav class="flex items-center justify-between top-0 w-full p-6 mt-2 z-10 bg-black">
        <div class="links hidden md:flex space-x-20">
            <a href="#lien1"
                class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Accueil</a>

                <div class="relative">
                    <a id="categorie-link" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">
                        Catégories
                        <i id="menu-icon" class="fas fa-chevron-down ml-2"></i>
                    </a>
                    <!-- Menu déroulant -->
                    <div id="submenu" class="hidden absolute mt-2 w-48 bg-white text-black  ">
                        @foreach ($categories as $category)
                            <a href="#" class="block px-4 py-2 text-md hover:text-blue-600 transition duration-500">{{ $category->nom }}</a>
                        @endforeach
                    </div>
                </div>
                

            <a href="#lien3"
                class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Evènements</a>
        </div>

        <div class="absolute left-1/2 transform -translate-x-1/2">
            <img src="{{ asset('img/readtechblogwhite.png') }}" alt="Readtech Logo" class="mt-2 h-40 md:h-40">
        </div>

        <div class="hidden md:flex items-center space-x-6 relative">
            <div class="flex items-center bg-white rounded-full shadow-md px-4 py-2">
                <i class="fas fa-search text-gray-500"></i>
                <input type="text" placeholder="Rechercher" class="ml-2 text-gray-500 placeholder-gray-500 focus:outline-none">
            </div>
        
            <div class="relative">
                <i id="auth-icon" class="fa-regular fa-circle-user text-white text-3xl cursor-pointer"></i>
        
                <div id="auth-dropdown" class="absolute right-0 mt-2 w-40 bg-white text-black shadow-lg rounded-lg hidden">
                    @guest
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-md hover:text-blue-700 transition duration-500">Connexion</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-md hover:text-blue-700 transition duration-500">Inscription</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm">Mon compte</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-left transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">Déconnexion</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
        

        <div class="md:hidden">
            <button id="menu-toggle" class="text-2xl text-white focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    
    {{-- HEADER SECTION --}}
    <header>
   
    </header>
</body>
</html>