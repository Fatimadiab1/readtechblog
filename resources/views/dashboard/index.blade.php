<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/readtechblacklogo.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

 <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold">Dashboard</div>
        <nav class="flex-grow">
            <ul>
                <li class="px-6 py-3 hover:bg-blue-800 transition duration-500">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <span class="text-md font-medium">Accueil</span>
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
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="w-full bg-red-600 hover:bg-red-500 py-2 rounded transition duration-500">Déconnexion</button>
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

            {{-- Statistiques --}}
            <section class="p-6 mt-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- User Stats Card -->
                    <div class="bg-white rounded-lg shadow-xl p-6 flex items-center justify-between ">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-4 ">
                                <i class="fa-solid fa-user text-white text-3xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-700">Utilisateurs</h2>
                                <p class="text-3xl font-bold text-blue-800">{{$utilisateur->count()}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Statistiques articles --}}
                    <div class="bg-white rounded-lg shadow-xl p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-green-600 to-green-800 p-4">
                                <i class="fa-solid fa-newspaper text-white text-3xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-700">Articles</h2>
                                <p class="text-3xl font-bold text-green-800">{{$article->count()}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Statistiques catégories --}}
                    <div class="bg-white rounded-lg shadow-xl p-6 flex items-center justify-between ">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-purple-600 to-purple-800 p-4 ">
                                <i class="fa-solid fa-list text-white text-3xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-700">Catégories</h2>
                                <p class="text-3xl font-bold text-purple-800">{{$categorie->count()}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Statistiques évènements --}}
                    <div class="bg-white rounded-lg shadow-xl p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-red-600 to-red-800 p-4 ">
                                <i class="fa-solid fa-calendar-days text-white text-3xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-700">Evènements</h2>
                                <p class="text-3xl font-bold text-red-800">{{$evenement->count()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="p-4">
                <h2 class="text-3xl font-semibold text-gray-900 mb-6">Statistiques des articles</h2>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Vues des derniers articles</h3>
                    <canvas id="articleViewsChart" height="100"></canvas>
                </div>
            </section>




        </main>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('articleViewsChart').getContext('2d');
        const articleData = @json($article->pluck('views'));
        const articleTitles = @json($article->pluck('titre'));

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: articleTitles,
                datasets: [{
                    label: 'Vues',
                    data: articleData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    x: {
                        title: { display: true, text: 'Articles', color: '#666' },
                    },
                    y: {
                        title: { display: true, text: 'Vues', color: '#666' },
                        beginAtZero: true,
                    }
                }
            }
        });
    });
</script>

</html>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
