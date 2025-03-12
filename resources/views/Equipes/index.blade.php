<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Liste des Équipes')

@section('content')
    <h2>Équipes</h2>
    <a href="{{ route('equipes.create') }}" class="btn btn-primary mb-3">Ajouter une équipe</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Pays</th>
                <th>Entraîneur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipe as $eq)
                <tr>
                    <td>{{ $eq->nom }}</td>
                    <td>{{ $eq->pays }}</td>
                    <td>{{ $eq->entraineur }}</td>
                    <td>
                        <a href="{{ route('equipes.show', $eq->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('equipes.edit', $eq->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('equipes.destroy', $eq->id) }}" method="POST" style="display:inline;">
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
