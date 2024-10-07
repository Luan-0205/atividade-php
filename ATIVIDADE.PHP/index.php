<?php
require 'conexao.php';


$sql = "SELECT * FROM tarefas";
$stmt = $pdo->query($sql);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Tarefas</h1>

    <div style="text-align:center;">
        <a href="cadastrar.php">Cadastrar Nova Tarefa</a>
    </div>

    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
            <li>
                <strong><?php echo htmlspecialchars($tarefa['titulo']); ?></strong><br>
                <span><?php echo htmlspecialchars($tarefa['descricao']); ?></span><br>
                <span>Status: <?php echo htmlspecialchars($tarefa['status']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>