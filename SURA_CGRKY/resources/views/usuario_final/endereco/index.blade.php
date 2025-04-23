<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Endereços de {{ $usuario->nome_completo }}</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            padding: 2rem;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
@if (session('success'))
    <div style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <h2>Endereços de {{ $usuario->nome_completo }}</h2>

        @if ($usuario->enderecos->isEmpty())
            <p>Nenhum endereço cadastrado ainda.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Bairro</th>
                        <th>Estado</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario->enderecos as $endereco)
                        <tr>
                            <td>{{ $endereco->cidade }}</td>
                            <td>{{ $endereco->cep }}</td>
                            <td>{{ $endereco->bairro }}</td>
                            <td>{{ $endereco->estado }}</td>
                            <td>{{ $endereco->rua }}</td>
                            <td>{{ $endereco->numero }}</td>
                            <td>
                                <!-- Botão Editar -->
                                <a href="{{ route('endereco.edit', ['id' => $usuario->id, 'endereco_id' => $endereco->id]) }}">Editar</a>

                                <!-- Botão Excluir -->
                                <form action="{{ route('endereco.destroy', ['id' => $usuario->id, 'endereco_id' => $endereco->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; border:none; background:none; cursor:pointer;">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
