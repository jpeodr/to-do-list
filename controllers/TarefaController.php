<?php
require_once __DIR__ . '/../models/Tarefa.php';

class TarefaController {
    private $tarefa;

    public function __construct() {
        $this->tarefa = new Tarefa();
    }

    public function index() {
        $tarefas = $this->tarefa->listar();
        include __DIR__ . '/../views/cabecalho.php';
        include __DIR__ . '/../views/tarefas/index.php';
        include __DIR__ . '/../views/rodape.php';
    }

    public function criar() {
        include __DIR__ . '/../views/cabecalho.php';
        include __DIR__ . '/../views/tarefas/formulario.php';
        include __DIR__ . '/../views/rodape.php';
    }

    public function salvar() {
        if (!empty($_POST['titulo'])) {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'] ?? '';
            $status = $_POST['status'] ?? 'a_fazer';
            $this->tarefa->criar($titulo, $descricao, $status);
        }
        header('Location: index.php');
        exit;
}

    public function editar($id) {
        $tarefa = $this->tarefa->buscarPorId($id);
        include __DIR__ . '/../views/cabecalho.php';
        include __DIR__ . '/../views/tarefas/formulario.php';
        include __DIR__ . '/../views/rodape.php';
    }

    public function atualizar($id) {
        if (!empty($_POST['titulo'])) {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'] ?? '';
            $status = $_POST['status'] ?? null;
            if ($status === null) {
                $atual = $this->tarefa->buscarPorId($id);
                $status = $atual ? $atual['status'] : 'a_fazer';
            }
            $this->tarefa->atualizar($id, $titulo, $status, $descricao);
        }
        header('Location: index.php');
        exit;
    }

    public function excluir($id) {
        $this->tarefa->excluir($id);
        header('Location: index.php');
        exit;
    }

    public function mover() {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? null;
        if ($id && $status) {
            $this->tarefa->atualizarStatus($id, $status);
            header('Content-Type: application/json');
            echo json_encode(['ok' => true]);
            return;
        }
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(['ok' => false]);
    }

    public function mostrar($id) {
        $tarefa = $this->tarefa->buscarPorId($id);
        header('Content-Type: application/json');
        echo json_encode($tarefa ?: []);
    }
}
?>
