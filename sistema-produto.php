<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO produto (id_produto, nome_produto, preco_produto, foto_produto) VALUES (?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("isds", $id_produto, $nome_produto, $preco_produto, $foto_produto);

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

  $id_produto = 4;
  $nome_produto = "Product 4";
  $preco_produto = 25.99;
  $foto_produto = "product4.jpg";
  $stmt->execute();

  echo "New records created successfully";
  $stmt->close();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>