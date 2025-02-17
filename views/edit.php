<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarefa</h1>
        <form method="POST">
            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="title" value="<?= htmlspecialchars($taskData['title']) ?>" required>
            </div>
            
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description"><?= htmlspecialchars($taskData['description']) ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Data de Vencimento:</label>
                <input type="date" name="due_date" value="<?= $taskData['due_date'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Status:</label>
                <select name="status">
                    <option value="pendente" <?= $taskData['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="em_andamento" <?= $taskData['status'] == 'em_andamento' ? 'selected' : '' ?>>Em Andamento</option>
                    <option value="concluida" <?= $taskData['status'] == 'concluida' ? 'selected' : '' ?>>Concluída</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Prioridade:</label>
                <select name="priority">
                    <option value="baixa" <?= $taskData['priority'] == 'baixa' ? 'selected' : '' ?>>Baixa</option>
                    <option value="media" <?= $taskData['priority'] == 'media' ? 'selected' : '' ?>>Média</option>
                    <option value="alta" <?= $taskData['priority'] == 'alta' ? 'selected' : '' ?>>Alta</option>
                </select>
            </div>
            
            <button type="submit" class="btn-submit">Atualizar</button>
            <a href="index.php" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html> 