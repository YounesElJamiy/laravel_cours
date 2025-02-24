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
            @foreach ($transferts as $transfert)
                <tr>
                    <td>{{ $transfert->joueur->nom }} {{ $transfert->joueur->prenom }}</td>
                    <td>{{ $transfert->equipeDepart->nom }}</td>
                    <td>{{ $transfert->equipeArrivee->nom }}</td>
                    <td>{{ $transfert->montant }} €</td>
                    <td>{{ $transfert->dateTransfert }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>
