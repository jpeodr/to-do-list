<div class="container">
    <h1 class="titulo"><?= isset($tarefa) ? 'Editar Tarefa' : 'Nova Tarefa' ?></h1>

    <form action="index.php?acao=<?= isset($tarefa) ? 'atualizar' : 'armazenar' ?>" method="POST" class="form-card">
        <?php if (isset($tarefa)): ?>
            <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
        <?php endif; ?>

        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" required value="<?= $tarefa['titulo'] ?? '' ?>">
        </div>

        <div class="campo">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" rows="10"><?= $tarefa['descricao'] ?? '' ?></textarea>
        </div>

        

        <div class="acoes">
            <button type="submit" class="botao">Salvar</button>
            <a href="index.php" class="botao cancelar">Voltar</a>
        </div>
    </form>
</div>


