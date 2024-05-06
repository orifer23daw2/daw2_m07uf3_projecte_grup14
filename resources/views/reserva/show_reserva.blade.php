@extends('disseny')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalls de la Reserva</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Passaport del Client:</strong> {{ $reserva->passaport_client }}</li>
                        <li class="list-group-item"><strong>Codi de Vol:</strong> {{ $reserva->codi_vol }}</li>
                        <li class="list-group-item"><strong>Localitzador:</strong> {{ $reserva->localitzador }}</li>
                        <li class="list-group-item"><strong>Número de Seient:</strong> {{ $reserva->numero_seient }}</li>
                        <li class="list-group-item"><strong>Equipatge de Mà:</strong> {{ $reserva->equipatge_ma }}</li>
                        <li class="list-group-item"><strong>Equipatge de Cabina:</strong> {{ $reserva->equipatge_cabina }}</li>
                        <li class="list-group-item"><strong>Quantitat d'Equipatges:</strong> {{ $reserva->quantitat_equipatges }}</li>
                        <li class="list-group-item"><strong>Tipus d'Assegurança:</strong> {{ $reserva->tipus_assegurança }}</li>
                        <li class="list-group-item"><strong>Preu del Vol:</strong> {{ $reserva->preu_vol }}</li>
                        <li class="list-group-item"><strong>Tipus de Checking:</strong> {{ $reserva->tipus_checking }}</li>
                    </ul>
                    <a href="{{ route('reserva.index') }}" class="btn btn-primary">Tornar</a>
                    <a href="{{ route('reserva.pdf', ['passaport_client' => $reserva->passaport_client, 'codi_vol' => $reserva->codi_vol]) }}" class="btn btn-secondary">PDF</a>
                </div>
            </div>
        </div>
    </div>
@endsection
