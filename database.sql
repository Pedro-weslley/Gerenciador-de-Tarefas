CREATE DATABASE IF NOT EXISTS task_manager;
USE task_manager;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    due_date DATE,
    status ENUM('pendente', 'em_andamento', 'concluida') DEFAULT 'pendente',
    priority ENUM('baixa', 'media', 'alta') DEFAULT 'media',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); 

INSERT INTO tasks (title, description, due_date, status, priority) VALUES
('Reunião com cliente', 'Apresentar proposta de projeto para cliente XYZ', '2024-03-25', 'pendente', 'alta'),
('Relatório mensal', 'Preparar relatório de vendas do mês', '2024-03-20', 'em_andamento', 'alta'),
('Backup do sistema', 'Realizar backup completo do banco de dados', '2024-03-18', 'concluida', 'media'),
('Atualizar documentação', 'Revisar e atualizar documentação do projeto', '2024-03-30', 'pendente', 'baixa'),
('Pagar contas', 'Efetuar pagamento das contas do mês', '2024-03-15', 'pendente', 'alta'),
('Manutenção do servidor', 'Realizar manutenção preventiva no servidor', '2024-03-22', 'pendente', 'media'),
('Treinamento equipe', 'Preparar material para treinamento dos novos funcionários', '2024-03-28', 'em_andamento', 'media'),
('Comprar suprimentos', 'Fazer pedido de material de escritório', '2024-03-16', 'concluida', 'baixa'),
('Revisar código', 'Fazer code review do último sprint', '2024-03-21', 'pendente', 'alta'),
('Atualizar site', 'Publicar novas informações no site da empresa', '2024-03-19', 'em_andamento', 'media'),
('Organizar arquivos', 'Reorganizar estrutura de arquivos do projeto', '2024-03-17', 'concluida', 'baixa'),
('Preparar apresentação', 'Criar slides para reunião de stakeholders', '2024-03-26', 'pendente', 'alta'),
('Configurar ambiente', 'Configurar ambiente de desenvolvimento para novos devs', '2024-03-23', 'pendente', 'media'),
('Testar aplicação', 'Realizar testes de integração no sistema', '2024-03-24', 'em_andamento', 'alta'),
('Responder emails', 'Responder emails pendentes da semana', '2024-03-15', 'concluida', 'media'),
('Planejar sprint', 'Definir tarefas para próximo sprint', '2024-03-29', 'pendente', 'alta'),
('Atualizar currículo', 'Adicionar novos projetos ao currículo', '2024-03-20', 'pendente', 'baixa'),
('Estudar framework', 'Estudar nova versão do framework', '2024-03-25', 'em_andamento', 'media'),
('Backup pessoal', 'Fazer backup dos arquivos pessoais', '2024-03-18', 'pendente', 'baixa'),
('Revisar segurança', 'Análise de vulnerabilidades do sistema', '2024-03-27', 'pendente', 'alta'); 