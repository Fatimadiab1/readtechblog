<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">


</head>

<body>
    <header class="h-[750px]">
        <!-- BACKGROUND VIDEO -->
        <video autoplay muted loop class="absolute top-0 left-0 w-full h-[750px] object-cover -z-10">
            <source src="{{ asset('media/video.mp4') }}" type="video/mp4">
        </video>

        <!-- NAVBAR -->
        <nav class="flex items-center justify-between top-0 w-full p-4 mt-2 z-10">
            <div class="links hidden md:flex space-x-20">
                <a href="{{ route('accueil') }}"
                    class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Accueil</a>

                    <div class="relative">
                        <a id="categorie-link" class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF] cursor-pointer">
                            Catégories
                            <i id="menu-icon" class="fas fa-chevron-down ml-2"></i>
                        </a>
                        <!-- Menu déroulant -->
                        <div id="submenu" class="hidden absolute mt-2 w-48 bg-white text-black  ">
                            @foreach ($categories as $categorie)
                                <a href="{{route('categorie.show', ['id' => $categorie->id])}}" class="block px-4 py-2 text-md hover:text-blue-600 transition duration-500">{{ $categorie->nom }}</a>
                            @endforeach
                        </div>
                    </div>

                    {{-- @foreach ($evenements as $evenement)
                    @endforeach --}}
                <a href="{{route('evenement.show')}}"
                    class="text-white font-montserrat font-semibold text-lg transition-colors duration-500 ease-in-out hover:text-[#008CFF]">Evènements</a>
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

        <!-- Texte du header  -->
        <div id="texte" class="top-0 left-0 w-full h-full flex flex-col items-start px-6 pt-24 md:pt-32 lg:pt-40">
            <h1 class="text-white font-montserrat text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-semibold leading-tight md:leading-tight lg:leading-normal">
                Explorez <br> l'univers de la <br>
                <span class="text-[#008CFF]">technologie</span><br>
                et de <span class="text-[#008CFF]">l'innovation</span>
            </h1>
            <p class="text-white font-actor font-light text-sm md:text-base lg:text-lg xl:text-xl mt-4">
                Comprenez aujourd'hui, innovez demain.
            </p>
            <a href="#apropos">
                <i class="fas fa-arrow-down text-2xl md:text-3xl lg:text-4xl mt-6 text-[#008CFF] cursor-pointer"></i>
            </a>
            
        </div>


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

    </header>

     {{-- Partie articles  --}}
    <section class="firstsection">
        <img  class="handrobot1" src="img/mainrobot.png" alt="Main Robot Inversée">
        <p class="titrearticle">Les dernières <span style="color:#008CFF">actualités</span></p>
        <div class="articles">
            @foreach ($articles as $article)
                <div class="article-card">

                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-image h-[250px]">


                    <h3 class="article-title">{{ $article->titre }}</h3>

                    <p class="article-description">{{ Str::limit($article->description, 100) }}</p>

                    <a  data-aos="fade-up"  href="{{ route('article.show', $article->id) }}" class="article-readmore" >
                        Lire plus <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endforeach
        </div>
        <img class="handrobot2" src="img/mainrobot.png" alt="Main Robot Inversée">
 </section>


        {{-- Partie categories --}}

        <section class="secondsection py-16">
            <p class="titrecategorie">Nos différentes <span style="color:#008CFF">catégories</span></p>
        
            <div class="container">
                <div class="slider-container">
                    <div class="slider">
                        @foreach ($categories as $categorie)
                        <div class="slide">
                            <a href="{{ route('categorie.show', ['id' => $categorie->id]) }}" class="category-link">
                                <div class="category-card">
                                    <img src="{{ asset('storage/' . $categorie->image) }}" alt="{{ $categorie->nom }}" class="category-image">
                                    <div class="category-overlay">
                                        <div class="text1">{{ $categorie->nom }}</div>
                                        <div class="text2">{{ $categorie->articles_count }} articles</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
        
                    <button class="slider-btn prev">&lt;</button>
                    <button class="slider-btn next">&gt;</button>
                </div>
            </div>
        </section>
        

{{-- Partie a propos --}}
<section id="apropos" class="thirdsection">
    <img  class="robot" src="img/robot.png" alt="">
    <div class="apropos">
        <p class="titreapropos" data-aos="fade-up">Qui somme<span style="color:#008CFF"> nous</span>?</p>
        <div class="container">
            <div class="blue-square"></div>
            <div class="white-square">
            <p class="texte"><span style="font-family: 'Ovo', serif; font-size: 28px;font-weight: 500;">R</span>
                eadtechblog est une plateforme incontournable pour les passionnés de technologie et les curieux du monde numérique. Nous proposons des articles détaillés, des analyses approfondies et des guides pratiques couvrant une large gamme de sujets technologiques.
                readtechblog est une plateforme
                <br><br>
                Chez ReadTechBlog, nous croyons en la puissance
                de l'information pour éclairer, inspirer et transformer.
                 Notre objectif est de rendre la technologie accessible à tous .
            </p>
            </div>
          </div>
    </div>
    </section>
    {{-- Partie evenement --}}
    <section class="fourthsection">
        <div  class="events">
            <p class="titreevent">
                <span style="color:#008CFF">Événements</span> à venir
            </p>
            <div class="evenement">
                @foreach ($evenements as $evenement)
                    <div class="card">
                        <div class="event-details">
                            <div class="detail">
                            <p class="event-date">{{ $evenement->date }} <span style="color: white"> | </span> </p>
                            <p class="event-location">{{ $evenement->pays->nom }}</p>
                        </div>
                        <a class="lelien" href="{{route("evenement.show")}}">En savoir plus</a>
                        </div>
                        <h3 class="event-title" data-aos="fade-up">{{ $evenement->nom }}</h3>
                        <hr class="event-divider">
                    </div>
                @endforeach
            </div>
        </div>
        <img  class="robotcache" src="img/robot2.png" alt="">
    </section>
    {{-- Formulaire de contact --}}
    <section class="sectionfive">
<p data-aos="fade-up" class="titreform">
  Contactez-<span style="color:#008CFF">nous !</span>
</p>
<form action="{{ route('contact.send') }}" method="POST" class="form-container">
    @csrf
    <div class="form-row">
        <div class="form-group">
            <input class="put" type="text" id="nom" name="nom" placeholder="Votre nom" required>
        </div>
        <div class="form-group">
            <input class="put" type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
        </div>
    </div>
    <div class="form-group">
        <input class="put" type="email" id="email" name="email" placeholder="Votre email" required>
    </div>
    <div class="form-group">
        <textarea class="put" id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
    </div>
    <div class="checkbox-group">
        <input type="checkbox" id="consent" name="consent" value="1" required>
        <label for="consent">Vous consentez à recevoir des communications liées à ce service, sauf en cas de désabonnement explicite.</label>
    </div>
    <button type="submit" class="btn-submit">Envoyez</button>
</form>

    </section>
    <div class="scroll-img"></div>





{{-- Footer --}}
<footer class="footer">
    <div class="footer-logo">
        <img src="{{ asset('img/readtechblacklogo.png') }}" alt="Logo ReadBlogTech" />
    </div>
    <div class="footer-links">
        <a href="{{ route('accueil') }}" class="footer-link">Accueil</a>
        <div class="footer-link-categories">
            <p class="footer-link">Catégories</p>
            <div class="categories-list">
                @foreach ($categories as $category)
                    <a href="{{ route('categorie.show', ['id' => $category->id]) }}" class="category">{{ $category->nom }}</a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('evenement.show') }}" class="footer-link">Événements</a>
    </div>
    <hr class="footer-divider" />
    <div class="footer-bottom">
        <p class="footer-copyright">© 2025 ReadTechBlog</p>
        <div class="footer-social-icons">
            <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="https://youtube.com" target="_blank" class="social-icon"><i class="fab fa-youtube"></i></a>
            <a href="https://linkedin.com" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration:1000, 
        once: true,     
    });
</script>

</body>
<script src="{{ asset('js/nav.js') }}"></script>
</html>
