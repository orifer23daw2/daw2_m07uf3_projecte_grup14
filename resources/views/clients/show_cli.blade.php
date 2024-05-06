@extends('disseny')

@section('content')
    <div class="container">
        <h1>Detalls del Client</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Passaport del Client: {{ $client->passaport_client }}</h5>
                <p class="card-text">Nom i Cognoms: {{ $client->nom_cognoms }}</p>
                <p class="card-text">Edat: {{ $client->edat }}</p>
                <p class="card-text">Telèfon: {{ $client->telefon }}</p>
                <p class="card-text">Adreça: {{ $client->adreca }}</p>
                <p class="card-text">Ciutat: {{ $client->ciutat }}</p>
                <p class="card-text">País: {{ $client->pais }}</p>
                <p class="card-text">Email: {{ $client->email }}</p>
                <p class="card-text">Tipus de Targeta: {{ $client->tipus_targeta }}</p>
                <p class="card-text">Número de Targeta: {{ $client->numero_targeta }}</p>
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Tornar</a>
                <a href="{{ route('clients.pdf', $client->passaport_client) }}" class="btn btn-secondary">PDF</a>

            </div>
        </div>
    </div>
@endsection
