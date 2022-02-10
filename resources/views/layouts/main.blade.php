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

    @yield('content')

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
