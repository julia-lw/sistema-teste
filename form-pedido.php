<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pedido</title>
</head>
<body>

    <h2>Cadastro de Pedido</h2>

    <form action="form-pedido2.php" method="POST">
        <label for="usuario_id">ID do Usuário:</label><br>
        <input type="number" name="usuario_id" id="usuario_id" required><br><br>

        <label for="valor_total">Valor Total (R$):</label><br>
        <input type="number" step="0.01" name="valor_total" id="valor_total" required><br><br>

        <label for="forma_pagamento">Forma de Pagamento:</label><br>
        <select name="forma_pagamento" id="forma_pagamento" required>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Cash">Cash</option>
            <option value="Pix">Pix</option>
        </select><br><br>

        <button type="submit">Finalizar Pedido</button>
    </form>

</body>
</html>