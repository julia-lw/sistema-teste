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
$sql = "INSERT INTO usuario (id_usuario, nome_usuario, email_usuario) VALUES (?, ?, ?)";

// prepara o template da consulta SQL
if($stmt = $conn->prepare($sql)) {
  // Vincula os parâmetros
  $stmt->bind_param("sss", $id_usuario, $nome_usuario, $email_usuario);

  // define os valores dos parâmetros e executa a consulta
  $id_usuario = 1;
  $nome_usuario = "John";
  $email_usuario = "john@example.com";
  $stmt->execute();

  $id_usuario = 2;
  $nome_usuario = "Mary";
  $email_usuario = "mary@example.com";
  $stmt->execute();

  $id_usuario = 3;
  $nome_usuario = "Julie";
  $email_usuario = "julie@example.com";
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  $email_usuario = "mary@example.com";
  $stmt->execute();

  $id_usuario = 4;
  $nome_usuario = "Dooley";
  $email_usuario = "dooley@example.com";
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>