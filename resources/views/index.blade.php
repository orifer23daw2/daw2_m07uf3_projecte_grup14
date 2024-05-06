@extends('index_disseny')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Benvingut!</h1></div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('logo.png') }}" alt="Logotip de l'Aplicació" style="width: 100px;">
                    </div>
                    <p>Benvingut a FlyFly, la teva plataforma de gestió de vols preferida! Aquí pots trobar una àmplia gamma de serveis relacionats amb la reserva i gestió de vols.</p>
                    <p>Amb FlyFly, podràs:</p>
                    <ul>
                        <li>Cercar i reservar vols en línia de manera fàcil i ràpida.</li>
                        <li>Gestionar les teves reserves existents i fer canvis si és necessari.</li>
                        <li>Explorar destinacions populars i obtenir informació sobre vols disponibles.</li>
                        <li>Contactar amb el nostre equip de suport per a qualsevol consulta o assistència.</li>
                    </ul>
                    <p>Per gaudir de totes aquestes funcions i més, sisplau, inicia sessió:</p>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="btn btn-primary">Inicia Sessió</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
