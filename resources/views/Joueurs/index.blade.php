<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Liste des Joueurs')

@section('content')
    <h2>Joueurs</h2>
    <a href="{{ route('joueurs.create') }}" class="btn btn-primary mb-3">Ajouter un joueur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Poste</th>
                <th>Nationalité</th>
                <th>Équipe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($joueur as $jr)
                <tr>
                    <td>{{ $jr->nom }}</td>
                    <td>{{ $jr->prenom }}</td>
                    <td>{{ $jr->poste }}</td>
                    <td>{{ $jr->nationalite }}</td>
                    <td>{{ $jr->equipe->nom }}</td>
                    <td>
                        <a href="{{ route('joueurs.show', $jr->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('joueurs.edit', $jr->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('joueurs.destroy', $jr->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>
