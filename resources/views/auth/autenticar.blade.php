<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            /* Cor de fundo leve */
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
            /* background-color: rgba(0,68,123.100) */
            background-color: rgb(16, 94, 212)
        }
        .btn-primary:hover {
            /* width: 100%; */
            /* background-color: rgba(0,68,123.100) */
            /* background-color: rgba(1,42,166.100); */
            border: solid 2px rgba(239,26,37.100)
            
        }

        .mt-3 {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Autenticando</h2>
        {{-- action="{{route('autenticando')}}" --}}
        <form method="POST" action="{{ route('autenticando_funcionario') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="Digite o e-mail" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="tokenFunc" class="form-label">Token</label>
                <input type="text" class="form-control" id="tokenFunc" name="tokenFunc"
                    placeholder="Digite o código enviado pelo RH" value="{{ old('tokenFunc') }}">
                @error('tokenFunc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            

            <button type="submit" id="btnValidar" class="btn btn-primary">Validar</button>
        
            @if(session('invalid_login'))
                <div class="text-danger p-2 m-0 text-center">{{session('invalid_login')}}</div>
            @endif
            @if(session('success'))
                <div class="text-danger">{{session('success')}}</div>
            @endif
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
