@extends('disseny')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Vol</div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('vols.update', $vol->codi_vol) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="codi_vol">Codi de Vol</label>
                            <input type="text" class="form-control" id="codi_vol" name="codi_vol"
                                value="{{ $vol->codi_vol }}" required>
                        </div>

                        <div class="form-group">
                            <label for="codi_model_avio">Codi Model d'Avió</label>
                            <input type="text" class="form-control" id="codi_model_avio" name="codi_model_avio"
                                value="{{ $vol->codi_model_avio }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ciutat_origen">Ciutat Origen</label>
                            <input type="text" class="form-control" id="ciutat_origen" name="ciutat_origen"
                                value="{{ $vol->ciutat_origen }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ciutat_destinacio">Ciutat Destí</label>
                            <input type="text" class="form-control" id="ciutat_destinacio" name="ciutat_destinacio"
                                value="{{ $vol->ciutat_destinacio }}" required>
                        </div>

                        <div class="form-group">
                            <label for="terminal_origen">Terminal Origen</label>
                            <input type="text" class="form-control" id="terminal_origen" name="terminal_origen"
                                value="{{ $vol->terminal_origen }}" required>
                        </div>

                        <div class="form-group">
                            <label for="terminal_destinacio">Terminal Destí</label>
                            <input type="text" class="form-control" id="terminal_destinacio" name="terminal_destinacio"
                                value="{{ $vol->terminal_destinacio }}" required>
                        </div>

                        <div class="form-group">
                            <label for="data_sortida">Data de Sortida</label>
                            <input type="date" class="form-control" id="data_sortida" name="data_sortida"
                                value="{{ $vol->data_sortida }}" required>
                        </div>

                        <div class="form-group">
                            <label for="data_arribada">Data d'Arribada</label>
                            <input type="date" class="form-control" id="data_arribada" name="data_arribada"
                                value="{{ $vol->data_arribada }}" required>
                        </div>

                        <div class="form-group">
                            <label for="hora_sortida">Hora de Sortida</label>
                            <input type="time" class="form-control" id="hora_sortida" name="hora_sortida"
                                value="{{ $vol->hora_sortida }}" required>
                        </div>

                        <div class="form-group">
                            <label for="hora_arribada">Hora d'Arribada</label>
                            <input type="time" class="form-control" id="hora_arribada" name="hora_arribada"
                                value="{{ $vol->hora_arribada }}" required>
                        </div>

                        <div class="form-group">
                            <label for="classe">Classe</label>
                            <select class="form-control" id="classe" name="classe" required>
                                <option value="Turista" {{ $vol->classe == 'Turista' ? 'selected' : '' }}>Turista</option>
                                <option value="Business" {{ $vol->classe == 'Business' ? 'selected' : '' }}>Business
                                </option>
                                <option value="Primera" {{ $vol->classe == 'Primera' ? 'selected' : '' }}>Primera</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Canvis</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('vols.index') }}" class="btn btn-primary">Tornar</a>
@endsection
