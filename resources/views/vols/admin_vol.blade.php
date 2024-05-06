@extends('disseny')

@section('content')
    <h1>Llista de Vols</h1>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Botó per afegir un nou vol -->
                <a href="{{ route('vols.create') }}" class="btn btn-primary mb-3">Afegir Vol</a>
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
                    <th>ID</th>
                    <th>Origen</th>
                    <th>Destí</th>
                    <th>Accions</th> <!-- Columna per a botons d'acció -->
                </tr>
            </thead>
            <tbody>
                @foreach($dades_vols as $vol)
                <tr>
                    <td>{{$vol->codi_vol}}</td>
                    <td>{{$vol->origen}}</td>
                    <td>{{$vol->destino}}</td>
                    <td>
                        <form method="POST" action="{{ route('vols.destroy', $vol->codi_vol) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <a href="{{ route('vols.edit', $vol->codi_vol) }}" class="btn btn-primary btn-sm ml-2">Modificar</a>
                        <a href="{{ route('vols.show', $vol->codi_vol) }}" class="btn btn-success btn-sm ml-2">Detalls</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
