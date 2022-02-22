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
        {{-- validação --}}
        <script src="/js/validCpf.js"></script>

        {{-- font awesome --}}
        <script src="https://kit.fontawesome.com/36eec2ffe7.js" crossorigin="anonymous"></script>

        {{-- bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        {{-- sweet alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <div class="row">
            @if(session('create'))
                <script>swal('', '{{ session('create') }}', 'success')</script>
            @elseif(session('update'))
                <script>swal('', '{{ session('update') }}', 'success')</script>
            @elseif(session('destroy'))
                <script>swal('', '{{ session('destroy') }}', 'success')</script>
            @endif
        </div>

        {{-- modal de confirmação --}}
        <script src="/js/confirmModal.js"></script>

        {{-- mensagens de validação --}}
        @if($errors->any())
            @foreach($errors->all() as $error)
                <script>swal('Não Foi Possível Realizar Esta Ação!', '{{ $error }}', 'warning')</script>
            @endforeach
        @endif

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
                event.preventDefault();

                $.ajax({
                    url: "{{ route('criar') }}",
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        console.log(response['dados']);

                        swal('', response['message'], 'success')
                        $('#register').modal('hide')
                        $("form[id='form-register']")[0].reset()
                    },
                    error: function(response) {
                        if(response['responseJSON']['errors']) {
                            swal('Não Foi Possível Realizar Esta Ação!', response['responseJSON']['errors']['cpf']['0'], 'warning')
                        }
                    }
                })
            })
                        // let data = response['dados']
                        // let paciente = '';
                        // $('#div_pacientes').append(paciente);
                        // preppand
        </script>

    </div>
</body>
</html>
