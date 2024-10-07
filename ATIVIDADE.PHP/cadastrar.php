<?php
require 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    // Inserção no banco de dados
    $sql = "INSERT INTO tarefas (titulo, descricao, status) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $descricao, $status]);

    // Redireciona para a lista de tarefas
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nova Tarefa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Nova Tarefa</h1>

    <form action="cadastrar.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pendente">Pendente</option>
            <option value="concluída">Concluída</option>
        </select>

        <button type="submit">Cadastrar Tarefa</button>
    </form>
</body>
</html>