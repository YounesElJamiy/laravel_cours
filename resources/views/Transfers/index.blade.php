<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Liste des Transferts')

@section('content')
    <h2>Transferts</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Joueur</th>
                <th>De</th>
                <th>Vers</th>
                <th>Montant</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->joueur->nom }} {{ $transfer->joueur->prenom }}</td>
                    <td>{{ $transfer->equipeDepart->nom }}</td>
                    <td>{{ $transfer->equipeArrivee->nom }}</td>
                    <td>{{ $transfer->montant }} €</td>
                    <td>{{ $transfer->dateTransfert }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>
