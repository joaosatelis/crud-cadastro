<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ED2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

$sql = "DELETE FROM produto WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<p class='success'>Produto excluído com sucesso!</p>";
    header("Location: index.php"); 
    exit;
} else {
    echo "<p class='error'>Erro ao excluir o produto: " . $conn->error . "</p>";
}

$conn->close();
?>