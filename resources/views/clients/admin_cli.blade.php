@extends('disseny')

@section('content')
    <h1>Llista de clients</h1>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Botón para añadir un nuevo cliente -->
                <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Afegir Client</a>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Passaport Client</th>
                    <th>Nom i Cognoms</th>
                    <th>Accions</th> <!-- Columna para botones de acción -->
                </tr>
            </thead>
            <tbody>
                @foreach($dades_clients as $client)
                <tr>
                    <td>{{$client->passaport_client}}</td>
                    <td>{{$client->nom_cognoms}}</td>
                    <td>
                        <!-- Botones de eliminar, modificar y mostrar detalles -->
                        <form method="POST" action="{{ route('clients.destroy', $client->passaport_client) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <a href="{{ route('clients.edit', $client->passaport_client) }}" class="btn btn-primary btn-sm ml-2">Modificar</a>
                        <a href="{{ route('clients.show', $client->passaport_client) }}" class="btn btn-info btn-sm ml-2">Detalles</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
