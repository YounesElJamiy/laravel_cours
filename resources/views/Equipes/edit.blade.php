<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Modifier Équipe')

@section('content')
@if ($equipe)


    <h2>Modifier Équipe </h2>
    <form action="{{ route('equipes.update' , $equipe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'Équipe</label>
            <input type="text" class="form-control" id="nom" value="{{ $equipe->nom }}" name="nom" >
        </div>
        <div class="mb-3">
            <label for="pays" class="form-label">Pays</label>
            <input type="text" class="form-control" id="pays" value="{{ $equipe->pays }}" name="pays" >
        </div>
        <div class="mb-3">
            <label for="entraineur" class="form-label">Entraîneur</label>
            <input type="text" class="form-control" id="entraineur" value="{{ $equipe->entraineur }}" name="entraineur" >
        </div>
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
@else
    <p>Aucun equipe trouvée</p>
@endif
@endsection
</body>
</html>
