<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des animaux - Mini Ferme</title>
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
        <h1>Liste des animaux</h1>

        @can('admin-only')
            <a href="{{ route('animals.create') }}">Ajouter un animal</a>
        @endcan

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Espèce</th>
                    <th>Date de naissance</th>
                    <th>État de santé</th>
                    @can('admin-only')
                        <th>Actions</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach($animals as $animal)
                    <tr>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->species }}</td>
                        <td>{{ $animal->birthdate->format('d/m/Y') }}</td>
                        <td>{{ $animal->health_status ?? 'N/A' }}</td>
                        @can('admin-only')
                            <td>
                                <a href="{{ route('animals.edit', $animal) }}">Modifier</a>
                                <form action="{{ route('animals.destroy', $animal) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet animal ?')">Supprimer</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
