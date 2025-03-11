<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Ajouter une Équipe')

@section('content')
    <h2>Ajouter une Équipe</h2>
    <form action="{{ route('equipes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'Équipe</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="pays" class="form-label">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" required>
        </div>
        <div class="mb-3">
            <label for="entraineur" class="form-label">Entraîneur</label>
            <input type="text" class="form-control" id="entraineur" name="entraineur" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
@endsection

</body>
</html>
