@extends('layouts.app')

@section('title', 'Evenement')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/evenement.css') }}">
    <style>
 .header {
    position: relative;
    height: 600px;
    background-image: url('{{ asset('img/event.jpg') }}');
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
<body>
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
    <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Choisissez un pays</h2>
    <div class="flex justify-center">
        <form method="GET" action="{{ route('evenement.show') }}" class="relative w-full max-w-md">
            <select name="pays_id" class="select-style" onchange="this.form.submit()">
                <option value="" selected>Tous les pays</option>
                @foreach ($pays as $payss)
                    <option  value="{{ $payss->id }}" {{ request('pays_id') == $payss->id ? 'selected' : '' }}>
                        {{ $payss->nom }}
                    </option>
                @endforeach
            </select>
        </form>
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
                <h3 data-aos="fade-up" class="text-xl font-bold mt-4">{{ $evenement->nom }}</h3>

                <!-- Contenu -->
                <p class="mt-2 text-gray-800">{{ $evenement->contenu }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
</body>

</html>
