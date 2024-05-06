@extends('disseny')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Reserva</div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('reserva.update', ['passaport_client' => $reserva->passaport_client, 'codi_vol' => $reserva->codi_vol]) }}">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="passaport_client">Passaport del Client</label>
                            <input type="text" class="form-control" id="passaport_client" name="passaport_client" value="{{ $reserva->passaport_client }}" required>
                        </div>

                        <div class="form-group">
                            <label for="codi_vol">Codi de Vol</label>
                            <input type="text" class="form-control" id="codi_vol" name="codi_vol" value="{{ $reserva->codi_vol }}" required>
                        </div>

                        <div class="form-group">
                            <label for="localitzador">Localitzador</label>
                            <input type="text" class="form-control" id="localitzador" name="localitzador" value="{{ $reserva->localitzador }}" required>
                        </div>

                        <div class="form-group">
                            <label for="numero_seient">Número de Seient</label>
                            <input type="number" class="form-control" id="numero_seient" name="numero_seient" value="{{ $reserva->numero_seient }}" required>
                        </div>

                        <div class="form-group">
                            <label for="equipatge_ma">Equipatge de Mà</label>
                            <select class="form-control" id="equipatge_ma" name="equipatge_ma" required>
                                <option value="sí" {{ $reserva->equipatge_ma == 'sí' ? 'selected' : '' }}>Sí</option>
                                <option value="no" {{ $reserva->equipatge_ma == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="equipatge_cabina">Equipatge de Cabina</label>
                            <select class="form-control" id="equipatge_cabina" name="equipatge_cabina" required>
                                <option value="sí" {{ $reserva->equipatge_cabina == 'sí' ? 'selected' : '' }}>Sí</option>
                                <option value="no" {{ $reserva->equipatge_cabina == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantitat_equipatges">Quantitat d'Equipatges</label>
                            <input type="number" class="form-control" id="quantitat_equipatges" name="quantitat_equipatges" value="{{ $reserva->quantitat_equipatges }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tipus_assegurança">Tipus d'Assegurança</label>
                            <select class="form-control" id="tipus_assegurança" name="tipus_assegurança" required>
                                <option value="Franquícia fins a 1000 Euros" {{ $reserva->tipus_assegurança == 'Franquícia fins a 1000 Euros' ? 'selected' : '' }}>Franquícia fins a 1000 Euros</option>
                                <option value="Franquícia fins 500 Euros" {{ $reserva->tipus_assegurança == 'Franquícia fins 500 Euros' ? 'selected' : '' }}>Franquícia fins 500 Euros</option>
                                <option value="Sense franquícia" {{ $reserva->tipus_assegurança == 'Sense franquícia' ? 'selected' : '' }}>Sense franquícia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="preu_vol">Preu del Vol</label>
                            <input type="text" class="form-control" id="preu_vol" name="preu_vol" value="{{ $reserva->preu_vol }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tipus_checking">Tipus de Checking</label>
                            <select class="form-control" id="tipus_checking" name="tipus_checking" required>
                                <option value="on-line" {{ $reserva->tipus_checking == 'on-line' ? 'selected' : '' }}>On-line</option>
                                <option value="mostrador" {{ $reserva->tipus_checking == 'mostrador' ? 'selected' : '' }}>Mostrador</option>
                                <option value="quiosc" {{ $reserva->tipus_checking == 'quiosc' ? 'selected' : '' }}>Quiosc</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Canvis</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('reserva.index') }}" class="btn btn-primary">Tornar</a>
@endsection
