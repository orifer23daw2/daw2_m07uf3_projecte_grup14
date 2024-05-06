<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF de Treballador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Dades del Treballador</h1>
    <table>
        <thead>
            <tr>
                <th>Nom i Cognoms</th>
                <th>Email</th>
                <th>Tipus</th>
                <th>Darrera Hora Entrada</th>
                <th>Darrera Hora Sortida</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $treballador->nom_cognoms }}</td>
                <td>{{ $treballador->email }}</td>
                <td>{{ $treballador->tipus }}</td>
                <td>{{ $treballador->darrera_hora_entrada }}</td>
                <td>{{ $treballador->darrera_hora_sortida }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
