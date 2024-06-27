<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastro.php">Cadastrar Produto</a></li>
        </ul>
    </nav>

    <h2>Novo Produto</h2>

    <?php
    if (isset($_POST["cadastrar"])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ED2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $nome = $_POST["nome"];
        $valor = $_POST["valor"];
        $descricao = $_POST["descricao"];

        $sql = "INSERT INTO produto (nome, valor, descricao) VALUES ('$nome', '$valor', '$descricao')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Produto cadastrado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao cadastrar o produto: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <form method="post" action="cadastro.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="valor">Valor em reais:</label>
        <input type="number" id="valor" name="valor" required>

        <label for="descricao">Descreva brevemente o produto:</label>
        <textarea id="descricao" name="descricao"></textarea>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
</body>
</html>