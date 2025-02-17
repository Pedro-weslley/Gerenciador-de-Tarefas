<?php
require_once 'models/Task.php';
require_once 'config/Database.php';

class TaskController {
    private $task;
    private $db;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->task = new Task($db);
    }

    public function index() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $tasks = $this->task->read($search, $status);
        include 'views/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->task->title = $_POST['title'];
            $this->task->description = $_POST['description'];
            $this->task->due_date = $_POST['due_date'];
            $this->task->status = $_POST['status'];
            $this->task->priority = $_POST['priority'];

            if ($this->task->create()) {
                header('Location: index.php');
            }
        }
        include 'views/create.php';
    }

    public function update($id) {
        $this->task->id = $id;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->task->title = $_POST['title'];
            $this->task->description = $_POST['description'];
            $this->task->due_date = $_POST['due_date'];
            $this->task->status = $_POST['status'];
            $this->task->priority = $_POST['priority'];

            if ($this->task->update()) {
                header('Location: index.php');
            }
        }
        
        $taskData = $this->task->readOne();
        include 'views/edit.php';
    }

    public function delete($id) {
        $this->task->id = $id;
        if ($this->task->delete()) {
            header('Location: index.php');
        }
    }
} 