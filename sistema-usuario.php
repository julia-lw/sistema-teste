<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuario (id_usuario, nome_usuario, email_usuario) VALUES (?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("iss", $id_usuario, $nome_usuario, $email_usuario);

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

  $id_usuario = 4;
  $nome_usuario = "Dooley";
  $email_usuario = "dooley@example.com";
  $stmt->execute();

  echo "New records created successfully";
  $stmt->close();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>