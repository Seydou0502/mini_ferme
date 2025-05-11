<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Ferme - Accueil</title>
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
        <h1>Bienvenue à la Mini Ferme de Samba</h1>
        <p>Gérez facilement vos animaux et suivez leur état sanitaire.</p>
    </main>
</body>
</html>
