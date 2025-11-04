<?php
require_once 'config/database.php';
require_once 'controllers/TarefaController.php';

$acao = $_GET['acao'] ?? 'index';

$controller = new TarefaController();

switch ($acao) {
    case 'criar':
        $controller->criar();
        break;

    case 'armazenar': 
        $controller->salvar(); 
        break;

    case 'editar':
        $controller->editar($_GET['id']);
        break;

    case 'atualizar':
        $controller->atualizar($_POST['id']);
        break;

    case 'excluir':
        $controller->excluir($_GET['id']);
        break;

    case 'mover':
        $controller->mover();
        break;

    case 'mostrar':
        $controller->mostrar($_GET['id']);
        break;

    default:
        $controller->index();
        break;
}