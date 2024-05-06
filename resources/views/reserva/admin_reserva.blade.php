@extends('disseny')

@section('content')
    <h1>Llista de reserves</h1>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Botón para añadir una nueva reserva -->
                <a href="{{ route('reserva.create') }}" class="btn btn-primary mb-3">Afegir Reserva</a>
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
                    <th>Codi Vol</th>
                    <th>Localitzador</th>
                    <th>Accions</th> <!-- Columna para botones de acción -->
                </tr>
            </thead>
            <tbody>
                @foreach($dades_reserva as $reserva)
                <tr>
                    <td>{{ $reserva->passaport_client }}</td>
                    <td>{{ $reserva->codi_vol }}</td>
                    <td>{{ $reserva->localitzador }}</td>
                    <td>
                        <!-- Botones de eliminar, modificar y mostrar detalles -->
                        <form method="POST" action="{{ route('reserva.destroy', [$reserva->passaport_client, $reserva->codi_vol]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <a href="{{ route('reserva.edit', [$reserva->passaport_client, $reserva->codi_vol]) }}" class="btn btn-primary btn-sm ml-2">Modificar</a>
                        <a href="{{ route('reserva.show', [$reserva->passaport_client, $reserva->codi_vol]) }}" class="btn btn-info btn-sm ml-2">Detalles</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
