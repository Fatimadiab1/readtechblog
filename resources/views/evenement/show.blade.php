<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
        <!-- Menu déroulant -->
        <div class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg group-hover:block">
            @foreach ($pays as $payss)
                <a href="{{ route('pays.show', ['id' => $payss->id]) }}"
                   class="block px-4 py-2 text-md hover:bg-blue-100 hover:text-blue-600 transition duration-300">
                    {{ $payss->nom }}
                </a>
            @endforeach
        </div>


    <style>
        .relative:hover .absolute {
            display: block;
        }
    </style>
    {{-- HEADER --}}
    <header class="bg-black text-white py-10">
        @foreach ($evenements as $evenement)
        <h1 class="text-center text-4xl">{{ $evenement->nom }}</h1>
        <p class="text-center mt-4">{{ $evenement->image }}</p>
        <p class="text-center mt-4">{{ $evenement->contenu }}</p>
        <p class="text-center mt-4">{{ $evenement->date }}</p>
        @endforeach
    </header>
</body>

</html>
