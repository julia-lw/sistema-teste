<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Item ao Pedido (Contém)</title>
</head>
<body>

    <h2>Adicionar Item ao Pedido</h2>

    <form action="form-contem2.php" method="POST">
        <label for="id_pedido">ID do Pedido:</label><br>
        <input type="number" name="id_pedido" id="id_pedido" required><br><br>

        <label for="id_produto">ID do Produto:</label><br>
        <input type="number" name="id_produto" id="id_produto" required><br><br>

        <label for="quantidade_contem">Quantidade:</label><br>
        <input type="number" name="quantidade_contem" id="quantidade_contem" min="1" required><br><br>

        <button type="submit">Adicionar Produto ao Pedido</button>
    </form>

</body>
</html>