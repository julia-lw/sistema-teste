<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sistema";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

$id_pedido = $_POST['id_pedido'] ?? null;
$id_produto = $_POST['id_produto'] ?? null;
$quantidade_contem = $_POST['quantidade_contem'] ?? null;

if ($id_pedido && $id_produto && $quantidade_contem) {
    $sql = "INSERT INTO contem (Pedido_id_pedido, Produto_id_produto, quantidade_contem) 
            VALUES (:id_pedido, :id_produto, :quantidade_contem)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_pedido', $id_pedido);
    $stmt->bindParam(':id_produto', $id_produto);
    $stmt->bindParam(':quantidade_contem', $quantidade_contem);

    if ($stmt->execute()) {
        $sucesso = true;

        $sqlProduto = "SELECT nome_produto, preco_produto FROM produto WHERE id_produto = :id_produto";
        $stmtProd = $pdo->prepare($sqlProduto);
        $stmtProd->bindParam(':id_produto', $id_produto);
        $stmtProd->execute();
        $dadosProduto = $stmtProd->fetch(PDO::FETCH_ASSOC);
    } else {
        $sucesso = false;
    }
} else {
    die("Por favor, preencha todos os campos do formulário.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Item Adicionado ao Pedido</title>
</head>
<body>

    <?php if (isset($sucesso) && $sucesso): ?>
        <h2>Item Adicionado com Sucesso ao Pedido #<?php echo htmlspecialchars($id_pedido); ?>!</h2>

        <p><strong>ID do Pedido:</strong> <?php echo htmlspecialchars($id_pedido); ?></p>
        <p><strong>ID do Produto:</strong> <?php echo htmlspecialchars($id_produto); ?></p>

        <?php if (!empty($dadosProduto)): ?>
            <p><strong>Nome do Produto:</strong> <?php echo htmlspecialchars($dadosProduto['nome_produto']); ?></p>
        <?php endif; ?>

        <p><strong>Quantidade:</strong> <?php echo htmlspecialchars($quantidade_contem); ?></p>

    <?php else: ?>
        <h2>Erro ao relacionar o produto ao pedido.</h2>
    <?php endif; ?>

</body>
</html>