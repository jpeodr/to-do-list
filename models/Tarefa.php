<?php
require_once __DIR__ . '/../config/database.php';

class Tarefa {
    private $conexao;

    public function __construct() {
        $this->conexao = BancoDeDados::obterInstancia();
        $this->criarTabela();
    }

    private function criarTabela() {
        $sql = "CREATE TABLE IF NOT EXISTS tarefas (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    titulo TEXT NOT NULL,
                    descricao TEXT,
                    status TEXT DEFAULT 'a_fazer',
                    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
                )";
        $this->conexao->exec($sql);
    }

    public function criar($titulo, $descricao = '', $status = 'a_fazer') {
        $sql = "INSERT INTO tarefas (titulo, descricao, status) VALUES (:titulo, :descricao, :status)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM tarefas ORDER BY id DESC";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tarefas WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $titulo, $status, $descricao = '') {
        $sql = "UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM tarefas WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function atualizarStatus($id, $status) {
        $sql = "UPDATE tarefas SET status = :status WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
