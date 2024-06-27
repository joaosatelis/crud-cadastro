<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
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

    <h2>Lista de Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor (R$)</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ED2";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM produto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["valor"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td>";
                    echo "<a href='editar.php?id=" . $row["id"] . "'>Editar</a> | ";
                    echo "<a href='excluir.php?id=" . $row["id"] . "'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>