<!DOCTYPE html>
<html>
<head>
    <title>Nova Tarefa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Nova Tarefa</h1>
        <form method="POST">
            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="title" required>
            </div>
            
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description"></textarea>
            </div>
            
            <div class="form-group">
                <label>Data de Vencimento:</label>
                <input type="date" name="due_date" required>
            </div>
            
            <div class="form-group">
                <label>Status:</label>
                <select name="status">
                    <option value="pendente">Pendente</option>
                    <option value="em_andamento">Em Andamento</option>
                    <option value="concluida">Concluída</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Prioridade:</label>
                <select name="priority">
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </div>
            
            <button type="submit" class="btn-submit">Salvar</button>
            <a href="index.php" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html> 