<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Minhas Tarefas</h1>
        
        <div class="filters">
            <form method="GET" action="index.php">
                <input type="text" name="search" placeholder="Pesquisar tarefas..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                <select name="status">
                    <option value="">Todos os status</option>
                    <option value="pendente" <?= isset($_GET['status']) && $_GET['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="em_andamento" <?= isset($_GET['status']) && $_GET['status'] == 'em_andamento' ? 'selected' : '' ?>>Em Andamento</option>
                    <option value="concluida" <?= isset($_GET['status']) && $_GET['status'] == 'concluida' ? 'selected' : '' ?>>Concluída</option>
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </div>

        <a href="index.php?action=create" class="btn-add">Nova Tarefa</a>

        <div class="tasks">
            <?php while ($row = $tasks->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="task-card">
                    <h3><?= htmlspecialchars($row['title']) ?></h3>
                    <p><?= htmlspecialchars($row['description']) ?></p>
                    <p>Vencimento: <?= date('d/m/Y', strtotime($row['due_date'])) ?></p>
                    <p>Status: <?= ucfirst($row['status']) ?></p>
                    <p>Prioridade: <?= ucfirst($row['priority']) ?></p>
                    <div class="actions">
                        <a href="index.php?action=update&id=<?= $row['id'] ?>" class="btn-edit">Editar</a>
                        <a href="index.php?action=delete&id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html> 