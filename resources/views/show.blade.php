@extends('layouts.edit')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card {{ $consult->color }}">
            <img src="/img/project/{{ $consult->image }}" class="card-img-top" title="Foto do Paciente">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user icon-card"></i> {{ $consult->choose_name }}</h5>
                <p class="card-text"><i class="fas fa-calendar-day icon-card"></i> <strong>IDADE:</strong> {{ $consult->age }} anos</p>
                <p class="card-text"><i class="fas fa-id-card icon-card"></i> <strong>CPF:</strong> {{ $consult->cpf }}</p>
                <p class="card-text"><i class="fas fa-mobile-alt icon-card"></i> <strong>NÚMERO:</strong> {{ $consult->number }}</p>
                <p class="card-text"><i class="fas fa-virus-covid icon-card"></i> <strong>{{ $consult->status }}</strong></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div id="sintomas" class="card">
            <div class="card-body">
                <p>Sintomas:</p>
                @if($consult->sintomas)
                    @foreach($consult->organization as $sintoma)
                        <li><i class="fas fa-angle-right me-1"></i>{{ $sintoma }}</li>
                    @endforeach
                @else
                    <li><i class="fas fa-angle-right me-1"></i>Sem Sintomas Apresentados</li>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
