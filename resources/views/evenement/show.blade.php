<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/evenement.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">
    <style>
 .header {
    position: relative;
    height: 600px;
    background-image: url('{{ asset('img/event.png') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    z-index: 10; 
}

       
    </style>
</head>

<body>
    {{-- NAVBAR --}}
    {{-- NAVBAR --}}
    <nav class="flex items-center justify-between top-0 w-full p-6   bg-black">
        <div class="links hidden md:flex space-x-20">
            <a href="{{ route('accueil') }}" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Accueil</a>
            
            <div class="relative">
                <a id="categorie-link" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">
                    Catégories
                    <i id="menu-icon" class="fas fa-chevron-down ml-2"></i>
                </a>
                <!-- Menu déroulant -->
                <div id="submenu" class="hidden absolute mt-2 w-48 bg-white text-black shadow-lg rounded-lg">
                    @foreach ($categories as $cat)
                        <a href="{{ route('categorie.show', ['id' => $cat->id]) }}" class="block px-4 py-2 text-md hover:text-blue-600 transition duration-500">
                            {{ $cat->nom }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('evenement.show') }}" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Évènements</a>
        </div>

        <div class="absolute left-1/2 transform -translate-x-1/2">
            <img src="{{ asset('img/readtechblogwhite.png') }}" alt="Readtech Logo" class="mt-4 h-40 md:h-40">
        </div>

        <div class="hidden md:flex items-center space-x-6 relative">
            <form action="{{ route('search') }}" method="GET" class="flex items-center w-full bg-gray-100 rounded-lg shadow-md px-4 py-2">
                <i class="fas fa-search text-gray-500"></i>
                <input
                    type="text"
                    name="q"
                    placeholder="Rechercher"
                    class="ml-2 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white bg-transparent w-full"
                    required
                >
            </form>
            

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
      <!-- Menu mobile -->
<div id="mobile-menu" class="hidden flex-col space-y-4 mt-20 bg-black bg-opacity-100 p-4 text-center text-lg md:hidden absolute top-0 left-0 w-full z-20">
    <form action="{{ route('search') }}" method="GET" class="flex items-center w-full bg-gray-100 rounded-lg shadow-md px-4 py-2">
        <i class="fas fa-search text-gray-500"></i>
        <input
            type="text"
            name="q"
            placeholder="Rechercher"
            class="ml-2 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white bg-transparent w-full"
            required
        >
    </form>
    
<div class="flex items-center justify-center text-center ">

    <a href="{{ route('accueil') }}" class="text-white m-1 font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Accueil</a>

    <div class="relative">
        <a id="categorie-link-mobile" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">
            Catégories
            <i id="menu-icon-mobile" class="fas fa-chevron-down ml-1"></i>
        </a>
        <!-- Sous-menu mobile -->
        <div id="submenu-mobile" class="hidden mt-2 bg-white text-black shadow-lg rounded-lg">
            @foreach ($categories as $categorie)
                <a href="{{route('categorie.show', ['id' => $categorie->id])}}" class="block px-4 py-2 text-sm hover:bg-gray-200">{{ $categorie->nom }}</a>
            @endforeach
        </div>
    </div>

</div>

    @guest
        <a href="{{ route('login') }}" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">Connexion</a>
        <a href="{{ route('register') }}" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">Inscription</a>
    @else
        <a href="{{ route('dashboard') }}" class="text-white font-montserrat font-semibold text-lg">Mon compte</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">Déconnexion</button>
        </form>
    @endguest
</div>

    {{-- HEADER --}}
    <header class="header">
        <div class="overlay"></div>
        <div class="content">
            <h1 class="titre">Événements</h1>
            <p class="soustitre">Découvrez les évènements à venir qui vous permettront de découvrir la technologie peu importe où vous êtes.</p>
        </div>
    </header>
{{-- MENU DÉROULANT DES PAYS --}}
<section class="py-10 px-5">
    <h2 class="text-2xl font-bold mb-4">Choisissez un pays</h2>
    <div class="dropdown">
        <button class="dropdown-btn">Sélectionner un pays <i class="fa-solid fa-caret-down" style="color: #ffffff;margin-left:5px"></i></button>
        <div class="dropdown-content">
            @foreach ($pays as $payss)
                <a href="{{ route('pays.show', ['id' => $payss->id]) }}">{{ $payss->nom }}</a>
            @endforeach
        </div>
    </div>
</section>
   {{-- CONTENU --}}
   <section class="py-10 px-6">
    <div class="flex flex-col gap-10">
        @foreach ($evenements as $evenement)
            <div class="event-card">
                <!-- Lieu -->
                @if ($evenement->pays && $evenement->pays->nom)
                    <p class="text-md text-gray-600 font-semibold">{{ $evenement->pays->nom }}</p>
                @endif

                <!-- Image -->
                @if ($evenement->image)
                    <img src="{{ asset('storage/' . $evenement->image) }}" alt="{{ $evenement->nom }}">
                @endif

                <!-- Date -->
                <p class="text-md text-gray-600 font-semibold">{{ $evenement->date }}</p>

                <!-- Titre -->
                <h3 class="text-xl font-bold mt-4">{{ $evenement->nom }}</h3>

                <!-- Contenu -->
                <p class="mt-2 text-gray-800">{{ $evenement->contenu }}</p>
            </div>
        @endforeach
    </div>
</section>
<footer class="footer">
    <div class="footer-logo">
        <img src="{{ asset('img/readtechblacklogo.png') }}" alt="Logo ReadBlogTech" />
    </div>
    <div class="footer-links">
        <a href="{{ url('/') }}" class="footer-link">Accueil</a>
        <div class="footer-link-categories">
            <p class="footer-link">Catégories</p>
            <div class="categories-list">
                @foreach ($categories as $category)
                    <p class="category">{{ $category->nom }}</p>
                @endforeach
            </div>
        </div>
        <a href="{{ url('/events') }}" class="footer-link">Événements</a>
    </div>
    <hr class="footer-divider" />
    <div class="footer-bottom">
        <p class="footer-copyright">© 2025 Readblogtech</p>
        <div class="footer-social-icons">
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</footer>
</body>

<script src="{{ asset('js/nav.js') }}"></script>
</html>
