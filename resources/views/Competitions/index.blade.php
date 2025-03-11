<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Liste des Competitions')

@section('content')
    <h2>Competitions</h2>
    <a href="{{ route('competitions.create') }}" class="btn btn-primary mb-3">Ajouter une competition</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Année</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
            <tr>
                <td>{{ $competition->nom }}</td>
                <td>{{ $competition->type }}</td>
                <td>{{ $competion->annee }}</td>
                <td>
                    <a href="{{ route('competitions.show', $competition->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('competitions.edit', $competition->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('competitions.destroy', $competition) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
