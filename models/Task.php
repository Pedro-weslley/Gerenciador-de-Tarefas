<?php
class Task {
    private $conn;
    private $table_name = "tasks";

    public $id;
    public $title;
    public $description;
    public $due_date;
    public $status;
    public $priority;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar nova tarefa
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                (title, description, due_date, status, priority)
                VALUES (:title, :description, :due_date, :status, :priority)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":due_date", $this->due_date);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":priority", $this->priority);

        return $stmt->execute();
    }

    // Ler todas as tarefas
    public function read($search = '', $status = '') {
        $query = "SELECT * FROM " . $this->table_name;
        $conditions = [];
        
        if ($search) {
            $conditions[] = "(title LIKE :search OR description LIKE :search)";
        }
        
        if ($status) {
            $conditions[] = "status = :status";
        }
        
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        
        $query .= " ORDER BY due_date ASC";

        $stmt = $this->conn->prepare($query);
        
        if ($search) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(":search", $searchTerm);
        }
        
        if ($status) {
            $stmt->bindParam(":status", $status);
        }
        
        $stmt->execute();
        return $stmt;
    }

    // Atualizar tarefa
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET title = :title,
                    description = :description,
                    due_date = :due_date,
                    status = :status,
                    priority = :priority
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":due_date", $this->due_date);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":priority", $this->priority);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Deletar tarefa
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // Buscar uma única tarefa
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
} 