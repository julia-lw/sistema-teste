<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query template
$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("sss", $firstname, $lastname, $email);

  // Set parameters and execute
  $firstname = "John";
  $lastname = "Doe";
  $email = "john@example.com";
  $stmt->execute();

  $firstname = "Mary";
  $lastname = "Moe";
  $email = "mary@example.com";
  $stmt->execute();

  $firstname = "Julie";
  $lastname = "Dooley";
  $email = "julie@example.com";
  $stmt->execute();
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>