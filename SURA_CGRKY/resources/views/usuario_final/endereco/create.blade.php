<form action="{{ route('endereco.store', $usuario->id) }}" method="POST">
    @csrf

    <input type="hidden" name="id_usuario" value="{{ $usuario->id }}">

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" required><br><br>

    <label for="cep">CEP:</label>
    <input type="text" name="cep" required><br><br>

    <label for="bairro">Bairro:</label>
    <input type="text" name="bairro" required><br><br>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" maxlength="2" required><br><br>

    <label for="rua">Rua:</label>
    <input type="text" name="rua" required><br><br>

    <label for="numero">Número:</label>
    <input type="text" name="numero" required><br><br>

    <button type="submit">Salvar Endereço</button>
</form>
