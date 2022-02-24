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

    @yield('navbar')

    @yield('modal-form')

    @yield('cards')

    {{-- voltar ao topo --}}
    <a id="back-to-top" class="hidden">
        <h1>
            <i class="fas fa-circle-arrow-up"></i>
        </h1>
    </a>

    <div id="scripts">
        {{-- validação cpf --}}
        <script src="/js/validCpf.js"></script>

        {{-- font awesome --}}
        <script src="https://kit.fontawesome.com/36eec2ffe7.js" crossorigin="anonymous"></script>

        {{-- bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        {{-- sweet alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('update'))
            <script>swal('', '{{ session('update') }}', 'success')</script>
        @elseif(session('destroy'))
            <script>swal('', '{{ session('destroy') }}', 'success')</script>
        @endif

        {{-- modal de confirmação --}}
        <script src="/js/confirmModal.js"></script>

        {{-- voltar ao topo --}}
        <script src="/js/backToTop.js"></script>

        {{-- jquery --}}
        <script src="/js/jquery-3.6.0.min.js"></script>

        {{-- máscaras --}}
        <script src="/js/jquery.mask.min.js"></script>
        <script>
            $(document).ready(() => {
                $('#cpf').mask('000.000.000-00')
                $('#number').mask('(00) 00000-0000')
            })
        </script>

        {{-- ajax --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
        <script>
            $("form[id='form-register']").submit(function(event) {
                event.preventDefault()
                if(validationFeedback() != false) {
                    $.ajax({
                        url: "{{ route('criar') }}",
                        type: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            swal('', response['message'], 'success')
                            $('#register').modal('hide')
                            $("form[id='form-register']")[0].reset()

                            let data = response['dados']
                            console.log(data)
                            
                            let cardRegister = `
                                <div class="col-lg-4">
                                    <div class="card ${data['color']}">
                                        <img src="/img/project/${data['image']}" class="card-img-top" title="Foto do Paciente">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-user icon-card"></i> ${data['choose_name']} </h5>
                                            <p class="card-text"><i class="fas fa-calendar-day icon-card"></i> <strong>IDADE:</strong> ${data['age']} ano(s)</p>
                                            <p class="card-text"><i class="fas fa-id-card icon-card"></i> <strong>CPF:</strong> ${data['cpf']} </p>
                                            <p class="card-text"><i class="fas fa-mobile-alt icon-card"></i> <strong>NÚMERO:</strong> ${data['number']} </p>
                                            <p class="card-text"><i class="fas fa-virus-covid icon-card"></i> <strong> ${data['status']} </strong></p>
                                            <a href="{{ route('mostrar.dados', $consult->id) }}" id="info-link" tabindex="-1"><i class="fas fa-info icon-card"></i><strong>MAIS INFORMAÇÕES</strong></a>
                                        </div>
                                    </div>
                                </div>
                            `
                            $('#card-register').prepend(cardRegister)
                        },
                        error: function(response) {
                            if(response['responseJSON']['errors']) {
                                swal('Não Foi Possível Realizar Esta Ação!', response['responseJSON']['errors']['cpf']['0'], 'warning')
                            }
                        }
                    })
                }
            })
        </script>
    </div>
</body>
</html>
