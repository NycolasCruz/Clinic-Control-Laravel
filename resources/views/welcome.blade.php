@extends('layouts.main')

@section('navbar')
    <nav class="navbar fixed-top navbar-dark">
        <div class="container-fluid mt-2 mb-2">
            <div>
                <a href="/" tabindex="-1"><img src="/img/logo.png"></a>
            </div>
            <form action="/" method="GET" class="d-flex">
                @if($search)
                    <a href="/" class="navbar-brand" tabindex="1">Ver Todos Os Cadastros <i class="fas fa-users"></i></a>
                @endif
                <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#register" tabindex="1">Cadastrar Paciente <i class="fas fa-user-plus"></i></a>
                <div class="input-group me-2">
                    <input type="text" name="search" class="form-control" placeholder="Busque por um paciente" autocomplete="off">
                    <button class="input-group-text" id="search-icon" tabindex="-1"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </nav>
@endsection

@section('modal-form')
    <div id="register" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('criar')}}" method="POST" id="form-register" class="register-form was-validated" name="form" enctype="multipart/form-data" onsubmit="return validationFeedback()">
                        @csrf
                        <div class="form-group">

                            {{-- formulário de cadastro --}}

                            <div class="form-floating mb-3 mt-4">
                                <input type="text" id="name" name="name" placeholder="." class="form-control border-valid" autocomplete="off" maxlength="50" pattern="[a-zA-Zá-úÁ-ÚãõÃÕçÇ\s]{3,50}" title="Utilize apenas letras!" value="{{ old('name') }}" required>
                                <label for="floatinginput">Digite o nome</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="socialName" name="socialName" placeholder="." class="form-control border-valid" autocomplete="off" maxlength="60" pattern="[a-zA-Zá-úÁ-ÚãõÃÕçÇ\s]{3,60}" title="Utilize apenas letras!" value="{{ old('socialName') }}">
                                <label for="floatinginput">Digite o nome social (opcional)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" id="age" name="age" placeholder="." class="form-control border-valid" autocomplete="off" min="0" max="120" value="{{ old('age') }}" required>
                                <label for="floatinginput">Digite a idade</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="cpf" name="cpf" placeholder="." class="form-control" autocomplete="off" maxlength="14" pattern="[0-9.-]{14}" title="Exemple: 000.000.000-00" value="{{ old('cpf') }}" required onkeyup="validationFeedback()">
                                <label for="floatinginput">Digite o CPF</label>
                                <div id="feedback"></div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" id="number" name="number" placeholder="." class="form-control border-valid" autocomplete="off" maxlength="15" pattern="[0-9-()\s]{15}" title="Exemple: (00) 00000-0000" value="{{ old('number') }}" required>
                                <label for="floatinginput">Digite o número de contato</label>
                            </div>
                            <div class="mb-1">
                                <label for="image" class="mb-1">Selecione a foto do paciente!</label>
                                <input type="file" id="image" name="image" class="form-control border-valid" accept="image/*" required>
                            </div>

                            {{-- formulário de sintomas --}}

                            <div class="form-check mt-3">
                                <h5>Selecione os Sintomas</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Cansaço" id="cansaço">
                                        <label class="form-check-label" for="cansaço">Cansaço</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Dores no Corpo" id="dores no corpo">
                                        <label class="form-check-label" for="dores no corpo">Dores no Corpo</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Coriza" id="coriza">
                                        <label class="form-check-label" for="coriza">Coriza</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Falta de Olfato" id="falta de olfato">
                                        <label class="form-check-label" for="falta de olfato">Falta de olfato</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Diarréia" id="diarréia">
                                        <label class="form-check-label" for="diarréia">Diarréia</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Falta de Paladar" id="falta de paladar">
                                        <label class="form-check-label" for="falta de paladar">Falta de paladar</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Dificuldade de Locomoção" id="dificuldade de locomoção">
                                        <label class="form-check-label" for="dificuldade de locomoção">Dificuldade de Locomoção</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Febre" id="febre">
                                        <label class="form-check-label" for="febre">Febre</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Dificuldade de Respirar" id="dificuldade de respirar">
                                        <label class="form-check-label" for="dificuldade de respirar">Dificuldade de Respirar</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Mal Estar Geral" id="mal estar geral">
                                        <label class="form-check-label" for="mal estar geral">Mal Estar Geral</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Dor de Cabeça" id="dor de cabeça">
                                        <label class="form-check-label" for="dor de cabeça">Dor de Cabeça</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Nariz Entupido" id="nariz entupido">
                                        <label class="form-check-label" for="nariz entupido">Nariz Entupido</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Dor de Garganta" id="dor de garganta">
                                        <label class="form-check-label" for="dor de garganta">Dor de Garganta</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="sintomas[]" value="Tosse" id="tosse">
                                        <label class="form-check-label" for="tosse">Tosse</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary mb-3 mt-2 modal-button" form="form-register">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cards')
    <div class="container">

        {{-- caso não tenha cadastros (encontrados) --}}

        @if(count($consults) == 0 && $search)
            <h5 class="mt-2">Nenhum Paciente Encontrado Com {{ $search }} <i class="fas fa-frown"></i></h5>
            <a href="/">Ver Todos os Cadastros!</a>
        @elseif(count($consults) == 0)
            <h5 class="mt-2">Nenhum Paciente Encontrado <i class="fas fa-frown"></i></h5>
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
                            <a href="show/{{ $consult->id }}" id="info-link" tabindex="-1"><i class="fas fa-info icon-card"></i><strong>MAIS INFORMAÇÕES</strong></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
