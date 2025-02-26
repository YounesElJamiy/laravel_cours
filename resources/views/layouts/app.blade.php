<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Football Manager</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('equipes.index') }}">Équipes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('joueurs.index') }}">Joueurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('competitions.index') }}">Compétitions</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('matchs.index') }}">Matchs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('transferts.index') }}">Transferts</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
