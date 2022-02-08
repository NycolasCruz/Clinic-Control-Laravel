<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinic Control</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- favIcon --}}
    <link rel="shortcut icon" href="/img/saude.ico" type="image/x-icon">

    {{-- css --}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

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

    {{-- mensagens de validação --}}

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="invalid-msg">{{ $error }}</p>
        @endforeach
    @endif

    <div class="container" id="container">
        @yield('content')
    </div>

    {{-- validação CPF --}}
    <script src="/js/validCpf.js"></script>

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/36eec2ffe7.js" crossorigin="anonymous"></script>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="js/jquery-3.6.0.min.js"></script>

    {{-- máscaras --}}
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00')
            $('#number').mask('(00) 00000-0000')
        })
    </script>

    {{-- ajax --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
</body>
</html>
