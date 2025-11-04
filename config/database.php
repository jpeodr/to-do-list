<?php
class BancoDeDados {
    private static $instancia = null;
    private $conexao;

    private function __construct() {
        $this->conexao = new PDO('sqlite:' . __DIR__ . '/../database/todolist.db');
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->criarTabela();
        $this->garantirColunas();
    }

    public static function obterInstancia() {
        if (!self::$instancia) {
            self::$instancia = new BancoDeDados();
        }
        return self::$instancia->conexao;
    }

    private function criarTabela() {
        $sql = "CREATE TABLE IF NOT EXISTS tarefas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            titulo TEXT NOT NULL,
            descricao TEXT,
            status TEXT NOT NULL DEFAULT 'a_fazer',
            criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $this->conexao->exec($sql);
    }

    private function garantirColunas() {
        $cols = $this->conexao->query("PRAGMA table_info(tarefas)")->fetchAll(PDO::FETCH_ASSOC);
        $nomes = array_map(function($c){ return $c['name']; }, $cols);
        if (!in_array('descricao', $nomes)) {
            $this->conexao->exec("ALTER TABLE tarefas ADD COLUMN descricao TEXT");
        }
        if (!in_array('criado_em', $nomes)) {
            $this->conexao->exec("ALTER TABLE tarefas ADD COLUMN criado_em DATETIME DEFAULT CURRENT_TIMESTAMP");
        }
    }
}
?>
