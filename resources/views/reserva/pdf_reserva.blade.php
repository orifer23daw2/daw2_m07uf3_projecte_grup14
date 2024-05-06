<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva {{ $reserva->passaport_client }} - {{ $reserva->codi_vol }}</title>
</head>
<body>
    <h1>Detalles de la Reserva</h1>
    <table>
        <tr>
            <th>Passaport del Client</th>
            <th>Codi de Vol</th>
            <th>Localitzador</th>
            <th>Número de Seient</th>
            <th>Equipatge de Mà</th>
            <th>Equipatge de Cabina</th>
            <th>Quantitat d'Equipatges</th>
            <th>Tipus d'Assegurança</th>
            <th>Preu del Vol</th>
            <th>Tipus de Checking</th>
        </tr>
        <tr>
            <td>{{ $reserva->passaport_client }}</td>
            <td>{{ $reserva->codi_vol }}</td>
            <td>{{ $reserva->localitzador }}</td>
            <td>{{ $reserva->numero_seient }}</td>
            <td>{{ $reserva->equipatge_ma }}</td>
            <td>{{ $reserva->equipatge_cabina }}</td>
            <td>{{ $reserva->quantitat_equipatges }}</td>
            <td>{{ $reserva->tipus_assegurança }}</td>
            <td>{{ $reserva->preu_vol }}</td>
            <td>{{ $reserva->tipus_checking }}</td>
        </tr>
    </table>
</body>
</html>
