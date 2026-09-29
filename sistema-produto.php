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
$sql = "INSERT INTO produto (id_produto, nome_produto, preco_produto, foto_produto) VALUES (?, ?, ?, ?)";

// prepara o template da consulta SQL
if($stmt = $conn->prepare($sql)) {
  // Vincula os parâmetros
  $stmt->bind_param("sss", $id_produto, $nome_produto, $preco_produto, $foto_produto);

  // define os valores dos parâmetros e executa a consulta
  $id_produto = 1;
  $nome_produto = "Product 1";
  $preco_produto = 10.99;
  $foto_produto = "product1.jpg";
  $stmt->execute();

  $id_produto = 2;
  $nome_produto = "Product 2";
  $preco_produto = 15.99;
  $foto_produto = "product2.jpg";
  $stmt->execute();

  $id_produto = 3;
  $nome_produto = "Product 3";
  $preco_produto = 20.99;
  $foto_produto = "product3.jpg";
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  $stmt->execute();

  $id_produto = 4;
  $nome_produto = "Product 4";
  $preco_produto = 25.99;
  $foto_produto = "product4.jpg";
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>