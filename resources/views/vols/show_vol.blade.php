@extends('disseny')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalls del Vol</div>

                <div class="card-body">
                    <p><strong>Codi de Vol:</strong> {{ $vol->codi_vol }}</p>
                    <p><strong>Codi del Model d'Avió:</strong> {{ $vol->codi_model_avio }}</p>
                    <p><strong>Ciutat d'Origen:</strong> {{ $vol->ciutat_origen }}</p>
                    <p><strong>Ciutat de Destí:</strong> {{ $vol->ciutat_destinacio }}</p>
                    <p><strong>Terminal d'Origen:</strong> {{ $vol->terminal_origen }}</p>
                    <p><strong>Terminal de Destí:</strong> {{ $vol->terminal_destinacio }}</p>
                    <p><strong>Data de Sortida:</strong> {{ $vol->data_sortida }}</p>
                    <p><strong>Data d'Arribada:</strong> {{ $vol->data_arribada }}</p>
                    <p><strong>Hora de Sortida:</strong> {{ $vol->hora_sortida }}</p>
                    <p><strong>Hora d'Arribada:</strong> {{ $vol->hora_arribada }}</p>
                    <p><strong>Classe:</strong> {{ $vol->classe }}</p>
                    <a href="{{ route('vols.index') }}" class="btn btn-primary">Tornar</a>
                    <a href="{{ route('vols.pdf', $vol->codi_vol) }}" class="btn btn-secondary">PDF</a>
                </div>
            </div>
        </div>
    </div>
@endsection
