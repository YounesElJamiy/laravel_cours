<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Détails du Joueur')

@section('content')
    <h2>{{ $joueur->nom }}</h2>
    <p><strong>Prénom :</strong> {{ $joueur->prenom }}</p>
    <p><strong>Poste :</strong> {{ $joueur->poste }}</p>
    <p><strong>Nationalité :</strong> {{ $joueur->nationalite }}</p>
    <p><strong>Nom de l'Equipe :</strong> {{ $joueur->equipe->nom }}</p>
    <a href="{{ route('joueurs.index') }}" class="btn btn-secondary">Retour</a>
@endsection

</body>
</html>
