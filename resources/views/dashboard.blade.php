@extends('layouts.app')

@section('content')

<div class="container">

<h3 class="mb-4">Dashboard del Sindicato</h3>

<div class="row">

<div class="col-md-2">
<div class="card text-center bg-primary text-white">
<div class="card-body">
<h5>👥 Afiliados</h5>
<h3>{{ $totalAfiliados }}</h3>
</div>
</div>
</div>

<div class="col-md-2">
<div class="card text-center bg-secondary text-white">
<div class="card-body">
<h5>📄 Solicitudes</h5>
<h3>{{ $totalSolicitudes }}</h3>
</div>
</div>
</div>

<div class="col-md-2">
<div class="card text-center bg-success text-white">
<div class="card-body">
<h5>✔️ Aprobadas</h5>
<h3>{{ $aprobadas }}</h3>
</div>
</div>
</div>

<div class="col-md-2">
<div class="card text-center bg-warning">
<div class="card-body">
<h5>⏳ Pendientes</h5>
<h3>{{ $pendientes }}</h3>
</div>
</div>
</div>



<div class="col-md-2">
    <div class="card text-center bg-danger text-white">
        <div class="card-body">
            <h5>❌ Rechazadas</h5>
            <h3>{{ $rechazadas }}</h3>
        </div>
    </div>
</div>

</div>

<div class="row mt-5">

    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
            Estado de Solicitudes
            </div>

            <div class="card-body">
                <canvas id="graficoEstados"></canvas>
            </div>

        </div>

    </div>


    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Solicitudes por Mes
            </div>

            <div class="card-body">
                <canvas id="graficoMes"></canvas>
            </div>

        </div>

    </div>

</div>

</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

new Chart(document.getElementById('graficoEstados'), {

type: 'pie',

data: {

labels: ['Pendientes','Aprobadas','Rechazadas'],

datasets: [{
data: [
{{ $pendientes }},
{{ $aprobadas }},
{{ $rechazadas }}
],
backgroundColor: [
'#ffc107',
'#198754',
'#dc3545'
]
}]

}

});


// grafico mensual

new Chart(document.getElementById('graficoMes'), {

type: 'bar',

data: {

labels: {!! json_encode(array_keys($solicitudesMes->toArray())) !!},

datasets: [{

label: 'Solicitudes',

data: {!! json_encode(array_values($solicitudesMes->toArray())) !!}

}]

}

});

});

</script>

@endsection