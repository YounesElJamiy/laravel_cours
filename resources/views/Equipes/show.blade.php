<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Détails de l\'Équipe')

@section('content')
    <h2>{{ $equipes->nom }}</h2>
    <p><strong>Pays :</strong> {{ $equipes->pays }}</p>
    <p><strong>Entraîneur :</strong> {{ $equipes->entraineur }}</p>
    <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Retour</a>
@endsection

</body>
</html>
