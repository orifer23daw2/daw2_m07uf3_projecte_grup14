<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client {{ $client->passaport_client }}</title>
</head>
<body>
    <h1>Client {{ $client->passaport_client }}</h1>
    <table>
        <tr>
            <th>Passaport Client</th>
            <th>Nom i Cognoms</th>
            <th>Edat</th>
            <th>Telèfon</th>
            <th>Adreça</th>
            <th>Ciutat</th>
            <th>País</th>
            <th>Email</th>
            <th>Tipus de Targeta</th>
            <th>Número de Targeta</th>
        </tr>
        <tr>
            <td>{{ $client->passaport_client }}</td>
            <td>{{ $client->nom_cognoms }}</td>
            <td>{{ $client->edat }}</td>
            <td>{{ $client->telefon }}</td>
            <td>{{ $client->adreca }}</td>
            <td>{{ $client->ciutat }}</td>
            <td>{{ $client->pais }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->tipus_targeta }}</td>
            <td>{{ $client->numero_targeta }}</td>
        </tr>
    </table>
</body>
</html>
