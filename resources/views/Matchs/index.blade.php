<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Liste des Matchs')

@section('content')
    <h2>Matchs</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Compétition</th>
                <th>Équipe Domicile</th>
                <th>Score</th>
                <th>Équipe Extérieur</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matchs as $match)
                <tr>
                    <td>{{ $match->competition->nom }}</td>
                    <td>{{ $match->equipeDomicile->nom }}</td>
                    <td>{{ $match->scoreDomicile }} - {{ $match->scoreExterieur }}</td>
                    <td>{{ $match->equipeExterieur->nom }}</td>
                    <td>{{ $match->dateMatch }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>
