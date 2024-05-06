@extends('disseny')

@section('content')
    <div class="container">
        <h1>Afegir Treballador</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="mt-4">
            <form action="{{ route('treballadors.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom_cognoms">Nom i Cognoms</label>
                    <input type="text" class="form-control" id="nom_cognoms" name="nom_cognoms" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contrasenya">Contrasenya</label>
                    <input type="password" class="form-control" id="contrasenya" name="contrasenya" required>
                </div>

                <div class="form-group">
                    <label for="tipus">Tipus</label>
                    <select class="form-control" id="tipus" name="tipus">
                        <option value="Cap">Cap</option>
                        <option value="Treballador">Treballador</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Afegir Treballador</button>
            </form>
        </div>
    </div>
    <a href="{{ route('treballadors.index') }}" class="btn btn-primary">Tornar</a>
@endsection
