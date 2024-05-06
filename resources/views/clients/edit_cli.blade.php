@extends('disseny')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Cliente</div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.update', $client->passaport_client) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="passaport_client">Passaport Client</label>
                            <input type="text" class="form-control" id="passaport_client" name="passaport_client"
                                value="{{ $client->passaport_client }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nom_cognoms">Nom i Cognoms</label>
                            <input type="text" class="form-control" id="nom_cognoms" name="nom_cognoms"
                                value="{{ $client->nom_cognoms }}" required>
                        </div>

                        <div class="form-group">
                            <label for="edat">Edat</label>
                            <input type="number" class="form-control" id="edat" name="edat"
                                value="{{ $client->edat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telefon">Telèfon</label>
                            <input type="text" class="form-control" id="telefon" name="telefon"
                                value="{{ $client->telefon }}">
                        </div>

                        <div class="form-group">
                            <label for="adreca">Adreça</label>
                            <input type="text" class="form-control" id="adreca" name="adreca"
                                value="{{ $client->adreca }}">
                        </div>

                        <div class="form-group">
                            <label for="ciutat">Ciutat</label>
                            <input type="text" class="form-control" id="ciutat" name="ciutat"
                                value="{{ $client->ciutat }}">
                        </div>

                        <div class="form-group">
                            <label for="pais">País</label>
                            <input type="text" class="form-control" id="pais" name="pais"
                                value="{{ $client->pais }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $client->email }}">
                        </div>

                        <div class="form-group">
                            <label for="tipus_targeta">Tipus de Targeta</label>
                            <select class="form-control" id="tipus_targeta" name="tipus_targeta">
                                <option value="Dèbit" {{ $client->tipus_targeta == 'Dèbit' ? 'selected' : '' }}>Dèbit
                                </option>
                                <option value="Crèdit" {{ $client->tipus_targeta == 'Crèdit' ? 'selected' : '' }}>Crèdit
                                </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="numero_targeta">Número de Targeta</label>
                            <input type="text" class="form-control" id="numero_targeta" name="numero_targeta"
                                value="{{ $client->numero_targeta }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('clients.index') }}" class="btn btn-primary">Tornar</a>
@endsection
