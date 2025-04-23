<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Endereços de {{ $fornecedor->nome_empresa }}</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f5f5f5;
            padding: 2rem;
        }
        .container {
            max-width: 900px;
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
    <div class="container">
        <h2>Endereços de {{ $fornecedor->nome_empresa }}</h2>

        @if ($enderecos->isEmpty())
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enderecos as $endereco)
                        <tr>
                            <td>{{ $endereco->cidade }}</td>
                            <td>{{ $endereco->cep }}</td>
                            <td>{{ $endereco->bairro }}</td>
                            <td>{{ $endereco->estado }}</td>
                            <td>{{ $endereco->rua }}</td>
                            <td>
                                <a href="{{ route('fornecedor.endereco.edit', ['id' => $fornecedor->id, 'endereco_id' => $endereco->id]) }}">Editar</a> |
                                <form action="{{ route('fornecedor.endereco.destroy', ['id' => $fornecedor->id, 'endereco_id' => $endereco->id]) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este endereço?')">Excluir</button>
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
