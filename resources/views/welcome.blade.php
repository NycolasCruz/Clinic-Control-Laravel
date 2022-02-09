@extends('layouts.main')
@section('content')

{{-- caso não tenha cadastros --}}

@if(count($consults) == 0 && $search)
    <h5 class="mt-2">Nenhum Cadastro Encontrado Com {{ $search }} <i class="fas fa-frown"></i></h5>
    <a href="/">Ver Todos os Cadastros!</a>
    @elseif(count($consults) == 0)
    <h5 class="mt-2">Nenhum Cadastro Encontrado <i class="fas fa-frown"></i></h5>
    <a class="mt-2" data-bs-toggle="modal" data-bs-target="#register">Cadastre Um Novo Paciente!</a>
@endif

<div class="row">
    @foreach($consults as $consult)
        <div class="col-lg-4">
            <div class="card {{ $consult->color }}">
                <img src="/img/project/{{ $consult->image }}" class="card-img-top" title="Foto do Paciente">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user icon-card"></i> {{ $consult->choose_name }}</h5>
                    <p class="card-text"><i class="fas fa-calendar-day icon-card"></i> <strong>IDADE:</strong> {{ $consult->age }} ano(s)</p>
                    <p class="card-text"><i class="fas fa-id-card icon-card"></i> <strong>CPF:</strong> {{ $consult->cpf }}</p>
                    <p class="card-text"><i class="fas fa-mobile-alt icon-card"></i> <strong>NÚMERO:</strong> {{ $consult->number }}</p>
                    <p class="card-text"><i class="fas fa-virus-covid icon-card"></i> <strong>{{ $consult->status }}</strong></p>
                    <a href="show/{{ $consult->id }}" class="btn btn-dark card-button" tabindex="-1">Mais Informações</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
