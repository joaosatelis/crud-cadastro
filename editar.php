<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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

    <h2>Editar Produto</h2>

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

    $sql = "SELECT * FROM produto WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p class='error'>Produto não encontrado.</p>";
        exit;
    }

    if (isset($_POST["editar"])) {

        $nome = $_POST["nome"];
        $valor = $_POST["valor"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE produto SET nome='$nome', valor='$valor', descricao='$descricao' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Produto atualizado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao atualizar o produto: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <form method="post" action="editar.php?id=<?php echo $id; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $row["nome"]; ?>" required>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" value="<?php echo $row["valor"]; ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"><?php echo $row["descricao"]; ?></textarea>

        <button type="submit" name="editar">Atualizar</button>
    </form>
</body>
</html>