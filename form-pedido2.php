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

$usuario_id = $_POST['usuario_id'] ?? null;
$valor_total = $_POST['valor_total'] ?? null;
$forma_pagamento = $_POST['forma_pagamento'] ?? null;
$data_pedido = date('Y-m-d H:i:s');

if ($usuario_id && $valor_total && $forma_pagamento) {
    $sql = "INSERT INTO pedido (data_pedido, valor_total_pedido, forma_pagamento, Usuario_id_usuario) 
            VALUES (:data_pedido, :valor_total, :forma_pagamento, :usuario_id)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':data_pedido', $data_pedido);
    $stmt->bindParam(':valor_total', $valor_total);
    $stmt->bindParam(':forma_pagamento', $forma_pagamento);
    $stmt->bindParam(':usuario_id', $usuario_id);

    if ($stmt->execute()) {
        $id_pedido = $pdo->lastInsertId();
        $sucesso = true;
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
    <title>Detalhes do Pedido</title>
</head>
<body>

    <?php if (isset($sucesso) && $sucesso): ?>
        <h2>Pedido Cadastrado com Sucesso!</h2>

        <p><strong>Número do Pedido (ID):</strong> <?php echo $id_pedido; ?></p>
        <p><strong>Data do Pedido:</strong> <?php echo date('d/m/Y H:i:s', strtotime($data_pedido)); ?></p>
        <p><strong>ID do Usuário:</strong> <?php echo htmlspecialchars($usuario_id); ?></p>
        <p><strong>Forma de Pagamento:</strong> <?php echo htmlspecialchars($forma_pagamento); ?></p>
        <p><strong>Valor Total:</strong> R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></p>
    <?php else: ?>
        <h2>Erro ao cadastrar o pedido.</h2>
    <?php endif; ?>

</body>
</html>