@extends('layouts.main')
@section('navbar')

{{-- navbar --}}

<nav class="navbar fixed-top navbar-dark">
    <div class="container-fluid mt-2 mb-2">
        <div>
            <a href="/" tabindex="-1"><img src="/img/logo.png"></a>
        </div>
        <div id="nav-flex">
            <form class="d-flex">
                <a class="navbar-brand" href="/" tabindex="1">Recepção <i class="fas fa-hospital"></i></a>
                <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#edit" tabindex="2">Editar Cadastro <i class="fas fa-user-edit"></i></a>
            </form>
            <form action="/show/{{ $consult->id }}" method="POST" id="form-delete" class="d-flex">
                @csrf
                @method('DELETE')
                <button id="delete-btn" type="submit" class="navbar-brand" tabindex="3" onclick="return confirm('Deseja Remover Este Cadastro Permanentemente?')">Excluir Cadastro <i class="fas fa-user-times"></i></button>
            </form>
        </div>
    </div>
</nav>

@endsection

@section('modal-form')

{{-- modal + formulário --}}

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/show/{{ $consult->id }}" method="POST" id="form-update" class="register-form was-validated" name="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        {{-- formulário de cadastro --}}

                        <div class="form-floating mb-3 mt-4">
                            <input type="text" name="name" placeholder="." class="form-control border-valid" autocomplete="off" maxlength="50" pattern="[a-zA-Zá-úÁ-ÚãõÃÕçÇ\s]{3,50}" title="Utilize apenas letras!" value="{{ $consult->name }}" required>
                            <label for="floatinginput">Digite o nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="socialName" placeholder="." class="form-control border-valid" autocomplete="off" maxlength="60" pattern="[a-zA-Zá-úÁ-ÚãõÃÕçÇ\s]{3,60}" title="Utilize apenas letras!" value="{{ $consult->socialName }}">
                            <label for="floatinginput">Digite o nome social (se tiver)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="age" placeholder="." class="form-control border-valid" autocomplete="off" min="0" max="120" value="{{ $consult->age }}" required>
                            <label for="floatinginput">Digite a idade</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" id="cpf" name="cpf" placeholder="." class="form-control border-cpf" autocomplete="off" maxlength="14" pattern="[0-9.-]{14}" title="Exemple: 000.000.000-00" value="{{ $consult->cpf }}" required onkeyup="validationFeedback()" >
                            <label for="floatinginput">Digite o CPF</label>
                            <div id="feedback"></div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="number" name="number" placeholder="." class="form-control border-valid" autocomplete="off" maxlength="15" pattern="[0-9-()\s]{15}" title="Exemple: (00) 00000-0000" value="{{ $consult->number }}" required>
                            <label for="floatinginput">Digite o número de contato</label>
                        </div>
                        <div class="mb-1">
                            <label for="image" class="mb-1">Selecione a foto do paciente (caso queria trocar)</label>
                            <input type="file" name="image" class="form-control border-valid" accept="image/*">
                        </div>

                        {{-- formulário de sintomas --}}

                        <div class="form-check mt-3">
                            <h5>Selecione os Sintomas</h5>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Cansaço" id="cansaço" {{ $consult->sintomas && in_array('Cansaço', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cansaço">Cansaço</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Dores no Corpo" id="dores no corpo" {{ $consult->sintomas && in_array('Dores no Corpo', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dores no corpo">Dores no Corpo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Coriza" id="coriza" {{ $consult->sintomas && in_array('Coriza', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="coriza">Coriza</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Falta de Olfato" id="falta de olfato" {{ $consult->sintomas && in_array('Falta de Olfato', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="falta de olfato">Falta de olfato</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Diarréia" id="diarréia" {{ $consult->sintomas && in_array('Diarréia', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="diarréia">Diarréia</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Falta de Paladar" id="falta de paladar" {{ $consult->sintomas && in_array('Falta de Paladar', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="falta de paladar">Falta de paladar</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Dificuldade de Locomoção" id="dificuldade de locomoção" {{ $consult->sintomas && in_array('Dificuldade de Locomoção', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dificuldade de locomoção">Dificuldade de Locomoção</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Febre" id="febre" {{ $consult->sintomas && in_array('Febre', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="febre">Febre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Dificuldade de Respirar" id="dificuldade de respirar" {{ $consult->sintomas && in_array('Dificuldade de Respirar', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dificuldade de respirar">Dificuldade de Respirar</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Mal Estar Geral" id="mal estar geral" {{ $consult->sintomas && in_array('Mal Estar Geral', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mal estar geral">Mal Estar Geral</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Dor de Cabeça" id="dor de cabeça" {{ $consult->sintomas && in_array('Dor de Cabeça', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dor de cabeça">Dor de Cabeça</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Nariz Entupido" id="nariz entupido" {{ $consult->sintomas && in_array('Nariz Entupido', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nariz entupido">Nariz Entupido</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Dor de Garganta" id="dor de garganta" {{ $consult->sintomas && in_array('Dor de Garganta', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dor de garganta">Dor de Garganta</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="sintomas[]" value="Tosse" id="tosse" {{ $consult->sintomas && in_array('Tosse', $consult->sintomas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tosse">Tosse</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary mb-3 mt-2 modal-button" form="form-update">Enviar Novos Dados</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')

<div id="container" class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card {{ $consult->color }}">
                <img src="/img/project/{{ $consult->image }}" class="card-img-top" title="Foto do Paciente">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user icon-card"></i> {{ $consult->choose_name }}</h5>
                    <p class="card-text"><i class="fas fa-calendar-day icon-card"></i> <strong>IDADE:</strong> {{ $consult->age }} ano(s)</p>
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
</div>

@endsection
