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

$sql = "SELECT id, firstname, lastname FROM MyGuests";
// execução da consulta
$result = $conn->query($sql);

// processa os resultados
if ($result->num_rows > 0) {
  // saída de cada linha
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>