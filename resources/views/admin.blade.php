@extends('disseny')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Benvingut</div>

                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('vols.index') }}" class="list-group-item list-group-item-action">Gestionar Vols</a>
                            <a href="{{ route('clients.index') }}" class="list-group-item list-group-item-action">Gestionar Clients</a>
                            <a href="{{ route('reserva.index') }}" class="list-group-item list-group-item-action">Gestionar Reserves</a>
                            @can('cap.only')
                                <a href="{{ route('treballadors.index') }}" class="list-group-item list-group-item-action">Gestionar Treballadors</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
