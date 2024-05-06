@extends('disseny')

@section('content')
    <div class="container">
        <h1>Detalls del Treballador</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">ID del Treballador: {{ $treballador->id }}</h5>
                <p class="card-text">Nom i Cognoms: {{ $treballador->nom_cognoms }}</p>
                <p class="card-text">Email: {{ $treballador->email }}</p>
                <p class="card-text">Tipus: {{ $treballador->tipus }}</p>
                <p class="card-text">Última Hora d'Entrada: {{ $treballador->darrera_hora_entrada }}</p>
                <p class="card-text">Última Hora de Sortida: {{ $treballador->darrera_hora_sortida }}</p>
                <a href="{{ route('treballadors.index') }}" class="btn btn-primary">Tornar</a>
                <a href="{{ route('treballadors.pdf', $treballador->id) }}" class="btn btn-secondary">PDF</a>
            </div>
        </div>
    </div>
@endsection
