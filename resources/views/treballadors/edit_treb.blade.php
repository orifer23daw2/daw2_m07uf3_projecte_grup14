@extends('disseny')

@section('content')
    <div class="container">
        <h1>Editar Treballador</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="mt-4">
            <form action="{{ route('treballadors.update', $treballador->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nom_cognoms">Nom i Cognoms</label>
                    <input type="text" class="form-control" id="nom_cognoms" name="nom_cognoms"
                        value="{{ $treballador->nom_cognoms }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $treballador->email }}" required>
                </div>
                <div class="form-group">
                    <label for="tipus">Tipus</label>
                    <select class="form-control" id="tipus" name="tipus" required>
                        <option value="Cap" {{ $treballador->tipus == 'Cap' ? 'selected' : '' }}>Cap</option>
                        <option value="Treballador" {{ $treballador->tipus == 'Treballador' ? 'selected' : '' }}>Treballador
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Canvis</button>
            </form>
        </div>
    </div>
    <a href="{{ route('treballadors.index') }}" class="btn btn-primary">Tornar</a>
@endsection
