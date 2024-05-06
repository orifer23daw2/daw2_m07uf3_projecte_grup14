@extends('disseny')

@section('content')
    <h1>Llista de Treballadors</h1>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Botó per afegir un nou treballador -->
                <a href="{{ route('treballadors.create') }}" class="btn btn-primary mb-3">Afegir Treballador</a>
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
                    <th>Nom i Cognoms</th>
                    <th>Accions</th> <!-- Columna per a botons d'acció -->
                </tr>
            </thead>
            <tbody>
                @foreach($dades_treballadors as $treballador)
                <tr>
                    <td>{{$treballador->id}}</td>
                    <td>{{$treballador->nom_cognoms}}</td>
                    <td>
                        <!-- Botons per eliminar i modificar cada treballador -->
                        <form method="POST" action="{{ route('treballadors.destroy', $treballador->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <a href="{{ route('treballadors.edit', $treballador->id) }}" class="btn btn-primary btn-sm ml-2">Modificar</a>
                        <a href="{{ route('treballadors.show', $treballador->id) }}" class="btn btn-success btn-sm ml-2">Detalls</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
