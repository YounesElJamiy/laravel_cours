<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Ajouter un Joueur')

@section('content')
    <h2>Ajouter une Joueur</h2>
    <form action="{{ route('joueurs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du Joueur</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom du Joueur</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="poste" class="form-label">Poste</label>
            <input type="text" class="form-control" id="poste" name="poste" required>
        </div>
        <div class="mb-3">
            <label for="nationalite" class="form-label">Nationalité</label>
            <input type="text" class="form-control" id="nationalite" name="nationalite" required>
        </div>
        <div class="mb-3">
            <select class="form-select" name="equipe" id="equipe">
                <option disabled>Liste des equipes</option>
                @foreach($equipe as $eq)
                    <option value="{{ $eq->idEquipe }}" {{ $eq->idEquipe == $eq->idEquipe ? 'selected' : '' }}>{{ $eq->nom }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('joueurs.index') }}" class="btn btn-success">Ajouter</a>
    </form>
@endsection

</body>
</html>
