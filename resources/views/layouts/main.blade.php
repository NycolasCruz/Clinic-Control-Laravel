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
            <form method="GET" class="d-flex">
                <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#register" tabindex="1">Cadastrar Paciente <i class="fas fa-user-plus"></i></a>
                <div class="input-group me-2">
                    <input type="text" name="search" class="form-control" placeholder="Busque por um paciente" autocomplete="off">
                    <button class="input-group-text" id="search-icon" tabindex="-1"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </nav>

    {{-- modal + formulário --}}

    <div id="register" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/" method="POST" id="form-register" class="register-form was-validated" name="form" enctype="multipart/form-data">
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
                                <input type="text" id="cpf" name="cpf" placeholder="." class="form-control" autocomplete="off" maxlength="14" pattern="[0-9.-]{14}" title="Exemple: 000.000.000-00" value="{{ old('cpf') }}" required onkeyup=" validationFeedback()">
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

    {{-- mensagens de validação --}}

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="invalid-msg">{{ $error }}</p>
        @endforeach
    @endif
    <div class="row">
        @if(session('create'))
            <p class="valid-msg">{{ session('create') }}</p>
        @elseif(session('update'))
            <p class="valid-msg">{{ session('update') }}</p>
        @elseif(session('destroy'))
            <p class="invalid-msg">{{ session('destroy') }}</p>
        @endif
    </div>

    <div class="container">
        @yield('content')
    </div>

    {{-- validação CPF --}}
    <script src="js/validCpf.js"></script>

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
