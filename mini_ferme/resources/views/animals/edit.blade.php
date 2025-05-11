<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un animal - Mini Ferme</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('animals.index') }}">Liste des animaux</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        <h1>Modifier un animal</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('animals.update', $animal) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nom :</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $animal->name) }}" required><br><br>

            <label for="species">Espèce :</label><br>
            <input type="text" id="species" name="species" value="{{ old('species', $animal->species) }}" required><br><br>

            <label for="birthdate">Date de naissance :</label><br>
            <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $animal->birthdate->format('Y-m-d')) }}" required><br><br>

            <label for="health_status">État de santé :</label><br>
            <input type="text" id="health_status" name="health_status" value="{{ old('health_status', $animal->health_status) }}"><br><br>

            <button type="submit">Modifier</button>
        </form>
    </main>
</body>
</html>
