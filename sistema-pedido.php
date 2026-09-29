<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// checa conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query template
$sql = "INSERT INTO pedido (id_pedido, data_pedido, valor_total_pedido, forma_pagamento, Usuario_id_usuario ) VALUES (?, ?, ?, ?, ?)";

// prepara o template da consulta SQL
if($stmt = $conn->prepare($sql)) {
  // Vincula os parâmetros
  $stmt->bind_param("isdsi", $id_pedido, $data_pedido, $valor_total_pedido, $forma_pagamento, $Usuario_id_usuario);

  // define os valores dos parâmetros e executa a consulta
  $id_pedido = 1;
  $data_pedido = "2023-01-01";
  $valor_total_pedido = 10.99;
  $forma_pagamento = "Credit Card";
  $Usuario_id_usuario = 1;
  $stmt->execute();

  $id_pedido = 2;
  $data_pedido = "2023-01-02";
  $valor_total_pedido = 15.99;
  $forma_pagamento = "Debit Card";
  $Usuario_id_usuario = 2;
  $stmt->execute();

  $id_pedido = 3;
  $data_pedido = "2023-01-03";
  $valor_total_pedido = 20.99;
  $forma_pagamento = "Cash";
  $Usuario_id_usuario = 3;
  $stmt->execute();

  $id_pedido = 4;
  $data_pedido = "2023-01-04";
  $valor_total_pedido = 25.99;
  $forma_pagamento = "Pix";
  $Usuario_id_usuario = 4;
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>