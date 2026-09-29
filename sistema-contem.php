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
$sql = "INSERT INTO contem (Pedido_id_pedido, Produto_id_produto, quantidade_contem) VALUES (?, ?, ?)";

// prepara o template da consulta SQL
if($stmt = $conn->prepare($sql)) {
  // Vincula os parâmetros
  $stmt->bind_param("iii", $Pedido_id_pedido, $Produto_id_produto, $quantidade_contem);

  // define os valores dos parâmetros e executa a consulta
  $Pedido_id_pedido = 1;
  $Produto_id_produto = 1;
  $quantidade_contem = 10;
  $stmt->execute();

  $Pedido_id_pedido = 2;
  $Produto_id_produto = 2;
  $quantidade_contem = 10;
  $stmt->execute();

  $Pedido_id_pedido = 3;
  $Produto_id_produto = 3;
  $quantidade_contem = 10;
  $stmt->execute();

  $Pedido_id_pedido = 4;
  $Produto_id_produto = 4;
  $quantidade_contem = 10;
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>