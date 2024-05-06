<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalls del Vol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Detalls del Vol</h2>
    <table>
        <tr>
            <th>Codi del Vol</th>
            <th>Codi del Model d'Avió</th>
            <th>Ciutat d'Origen</th>
            <th>Ciutat de Destinació</th>
            <th>Terminal d'Origen</th>
            <th>Terminal de Destinació</th>
            <th>Data de Sortida</th>
            <th>Data d'Arribada</th>
            <th>Hora de Sortida</th>
            <th>Hora d'Arribada</th>
            <th>Classe</th>
        </tr>
        <tr>
            <td>{{ $vol->codi_vol }}</td>
            <td>{{ $vol->codi_model_avio }}</td>
            <td>{{ $vol->ciutat_origen }}</td>
            <td>{{ $vol->ciutat_destinacio }}</td>
            <td>{{ $vol->terminal_origen }}</td>
            <td>{{ $vol->terminal_destinacio }}</td>
            <td>{{ $vol->data_sortida }}</td>
            <td>{{ $vol->data_arribada }}</td>
            <td>{{ $vol->hora_sortida }}</td>
            <td>{{ $vol->hora_arribada }}</td>
            <td>{{ $vol->classe }}</td>
        </tr>
    </table>
</body>
</html>
