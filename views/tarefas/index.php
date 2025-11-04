<?php
$tarefasAFazer = array_filter($tarefas, fn($t) => $t['status'] === 'a_fazer');
$tarefasEmProgresso = array_filter($tarefas, fn($t) => $t['status'] === 'em_progresso');
$tarefasConcluidas = array_filter($tarefas, fn($t) => $t['status'] === 'concluida');
?>

<div class="container">
    <h1 class="titulo">Minhas Tarefas</h1>
    <button id="open-modal" class="botao" type="button">+ Nova Tarefa</button>
    <div class="kanban">
        <div class="coluna" data-status="a_fazer">
            <h2>A Fazer</h2>
            <?php foreach ($tarefasAFazer as $t): ?>
                <div class="tarefa afazer" draggable="true" data-id="<?= $t['id'] ?>">
                    <div class="card-head"><p class="titulo-tarefa"><?= htmlspecialchars($t['titulo']) ?></p></div>
                    <?php if (!empty($t['descricao'])): ?>
                        <?php $descSafe = nl2br(htmlspecialchars($t['descricao'])); ?>
                        <div class="descricao"><?= $descSafe ?></div>
                    <?php endif; ?>
                    <div class="acoes">
                        <a href="index.php?acao=editar&id=<?= $t['id'] ?>" class="acao editar" data-id="<?= $t['id'] ?>" title="Editar" style="padding:8px 12px;display:inline-flex;align-items:center;justify-content:center;">
                            <svg width="19" height="19" viewBox="0 0 20 20" fill="none" style="display:block;" xmlns="http://www.w3.org/2000/svg"><path d="M5 14.5V17h2.5l7.41-7.41a1.17 1.17 0 0 0 0-1.66l-2.34-2.33a1.17 1.17 0 0 0-1.66 0L5 14.5Zm10.71-7.79c.46-.46.46-1.2 0-1.65l-1.13-1.13a1.17 1.17 0 0 0-1.66 0l-1.07 1.07 2.34 2.34 1.07-1.07Z" stroke="#183251" stroke-width="1.3"/></svg>
                        </a>
                        <a href="index.php?acao=excluir&id=<?= $t['id'] ?>" class="acao" title="Excluir" onclick="return confirm('Excluir esta tarefa?')" style="padding:8px 12px;display:inline-flex;align-items:center;justify-content:center;">
                            <svg width="18" height="19" fill="none" viewBox="0 0 20 20" style="display:block;" xmlns="http://www.w3.org/2000/svg"><rect width="14" height="1.65" x="3" y="5.5" fill="#e84b4c" rx=".83"/><rect width="1.7" height="9" x="6.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="1.7" height="9" x="9.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="1.7" height="9" x="12.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="10" height="13" x="5" y="5.5" stroke="#e84b4c" stroke-width="1.1" rx="2"/></svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="coluna" data-status="em_progresso">
            <h2>Em Progresso</h2>
            <?php foreach ($tarefasEmProgresso as $t): ?>
                <div class="tarefa emprogresso" draggable="true" data-id="<?= $t['id'] ?>">
                    <div class="card-head"><p class="titulo-tarefa"><?= htmlspecialchars($t['titulo']) ?></p></div>
                    <?php if (!empty($t['descricao'])): ?>
                        <?php $descSafe = nl2br(htmlspecialchars($t['descricao'])); ?>
                        <div class="descricao"><?= $descSafe ?></div>
                    <?php endif; ?>
                    <div class="acoes">
                        <a href="index.php?acao=editar&id=<?= $t['id'] ?>" class="acao editar" data-id="<?= $t['id'] ?>" title="Editar" style="padding:8px 12px;display:inline-flex;align-items:center;justify-content:center;">
                            <svg width="19" height="19" viewBox="0 0 20 20" fill="none" style="display:block;" xmlns="http://www.w3.org/2000/svg"><path d="M5 14.5V17h2.5l7.41-7.41a1.17 1.17 0 0 0 0-1.66l-2.34-2.33a1.17 1.17 0 0 0-1.66 0L5 14.5Zm10.71-7.79c.46-.46.46-1.2 0-1.65l-1.13-1.13a1.17 1.17 0 0 0-1.66 0l-1.07 1.07 2.34 2.34 1.07-1.07Z" stroke="#183251" stroke-width="1.3"/></svg>
                        </a>
                        <a href="index.php?acao=excluir&id=<?= $t['id'] ?>" class="acao" title="Excluir" onclick="return confirm('Excluir esta tarefa?')" style="padding:8px 12px;display:inline-flex;align-items:center;justify-content:center;">
                            <svg width="18" height="19" fill="none" viewBox="0 0 20 20" style="display:block;" xmlns="http://www.w3.org/2000/svg"><rect width="14" height="1.65" x="3" y="5.5" fill="#e84b4c" rx=".83"/><rect width="1.7" height="9" x="6.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="1.7" height="9" x="9.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="1.7" height="9" x="12.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="10" height="13" x="5" y="5.5" stroke="#e84b4c" stroke-width="1.1" rx="2"/></svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="coluna" data-status="concluida">
            <h2>Concluído</h2>
            <?php foreach ($tarefasConcluidas as $t): ?>
                <div class="tarefa concluida" draggable="true" data-id="<?= $t['id'] ?>">
                    <div class="card-head"><p class="titulo-tarefa"><?= htmlspecialchars($t['titulo']) ?></p></div>
                    <?php if (!empty($t['descricao'])): ?>
                        <?php $descSafe = nl2br(htmlspecialchars($t['descricao'])); ?>
                        <div class="descricao"><?= $descSafe ?></div>
                    <?php endif; ?>
                    <div class="acoes">
                        <a href="index.php?acao=editar&id=<?= $t['id'] ?>" class="acao editar" data-id="<?= $t['id'] ?>" title="Editar" style="padding:8px 12px;display:inline-flex;align-items:center;justify-content:center;">
                            <svg width="19" height="19" viewBox="0 0 20 20" fill="none" style="display:block;" xmlns="http://www.w3.org/2000/svg"><path d="M5 14.5V17h2.5l7.41-7.41a1.17 1.17 0 0 0 0-1.66l-2.34-2.33a1.17 1.17 0 0 0-1.66 0L5 14.5Zm10.71-7.79c.46-.46.46-1.2 0-1.65l-1.13-1.13a1.17 1.17 0 0 0-1.66 0l-1.07 1.07 2.34 2.34 1.07-1.07Z" stroke="#183251" stroke-width="1.3"/></svg>
                        </a>
                        <a href="index.php?acao=excluir&id=<?= $t['id'] ?>" class="acao" title="Excluir" onclick="return confirm('Excluir esta tarefa?')" style="padding:8px 12px;display:inline-flex;align-items:center;justify-content:center;">
                            <svg width="18" height="19" fill="none" viewBox="0 0 20 20" style="display:block;" xmlns="http://www.w3.org/2000/svg"><rect width="14" height="1.65" x="3" y="5.5" fill="#e84b4c" rx=".83"/><rect width="1.7" height="9" x="6.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="1.7" height="9" x="9.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="1.7" height="9" x="12.15" y="6.5" fill="#e84b4c" rx=".85"/><rect width="10" height="13" x="5" y="5.5" stroke="#e84b4c" stroke-width="1.1" rx="2"/></svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
(function() {
  function getStatusByCol(col) {
    return col && col.getAttribute('data-status');
  }
  document.querySelectorAll('.coluna').forEach(function(coluna) {
    new Sortable(coluna, {
      group: 'kanban-fluid',
      animation: 250,
      easing: 'cubic-bezier(.23,1.2,.32,1)',
      dragClass: 'moving',
      ghostClass: 'fluid-ghost',
      chosenClass: 'on-drag',
      draggable: '.tarefa', // SOMENTE OS CARDS ARRASTÁVEIS
      filter: 'h2', // nunca permite selecionar o título
      preventOnFilter: false,
      forceFallback: false,
      onEnd: function (evt) {
        var card = evt.item;
        var destCol = evt.to;
        var newStatus = getStatusByCol(destCol);
        if (!card || !newStatus) return;
        // Atualiza status no backend se mudou de coluna
        if (evt.from !== evt.to) {
          fetch('index.php?acao=mover', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id=' + encodeURIComponent(card.getAttribute('data-id')) + '&status=' + encodeURIComponent(newStatus)
          });
          card.classList.remove('afazer','emprogresso','concluida');
          if (newStatus === 'a_fazer') card.classList.add('afazer');
          else if (newStatus === 'em_progresso') card.classList.add('emprogresso');
          else if (newStatus === 'concluida') card.classList.add('concluida');
        }
      }
    });
  });
  // CSS classes para animações visuais
  var style = document.createElement('style');
  style.innerHTML = `
    .fluid-ghost { opacity:0.7!important; background:rgba(244,247,255,0.92)!important; border:2px dashed #a5cdfd!important; box-shadow:0 8px 22px rgba(0,0,0,0.17); border-radius:20px; }
    .tarefa.moving { opacity:0.95; box-shadow: 0 12px 24px rgba(80,142,255,0.19); transform: scale(1.045)!important; cursor:grabbing; }
    .tarefa.on-drag { outline: 2.5px solid #3b82f6; z-index:3; filter: brightness(1.08); }
    .tarefa { transition: box-shadow .23s cubic-bezier(.16,1.2,.32,1),transform .23s cubic-bezier(.23,1.2,.32,1); }
  `;
  document.head.appendChild(style);
})();
</script>

<div id="create-modal" class="modal-backdrop" aria-hidden="true">
  <div class="modal-content">
    <h2>Nova Tarefa</h2>
    <form id="create-form" action="index.php?acao=armazenar" method="POST" class="form-card">
      <div class="campo">
        <label for="titulo-modal">Título</label>
        <input type="text" id="titulo-modal" name="titulo" required>
      </div>
      <div class="campo">
        <label for="descricao-modal">Descrição</label>
        <textarea id="descricao-modal" name="descricao" rows="6"></textarea>
      </div>
      <div class="modal-actions">
        <button type="button" id="cancel-modal" class="btn ghost">Cancelar</button>
        <button type="submit" class="btn primary">Salvar</button>
      </div>
    </form>
  </div>
  </div>

<script>
(function(){
  var open = document.getElementById('open-modal');
  var modal = document.getElementById('create-modal');
  var cancel = document.getElementById('cancel-modal');
  var form = document.getElementById('create-form');
  function show(){ modal.classList.add('open'); document.getElementById('titulo-modal').focus(); }
  function hide(){ modal.classList.remove('open'); }
  if (open) open.addEventListener('click', show);
  if (cancel) cancel.addEventListener('click', hide);
  if (modal) modal.addEventListener('click', function(e){ if (e.target === modal) hide(); });
  if (form) form.addEventListener('submit', function(e){
    e.preventDefault();
    var data = new URLSearchParams(new FormData(form));
    fetch(form.action, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: data.toString() })
      .then(function(r){ if (!r.ok) throw new Error(); return r.text(); })
      .then(function(){ window.location.reload(); });
  });
})();
</script>

<div id="edit-modal" class="modal-backdrop" aria-hidden="true">
  <div class="modal-content">
    <h2>Editar Tarefa</h2>
    <form id="edit-form" action="index.php?acao=atualizar" method="POST" class="form-card">
      <input type="hidden" id="edit-id" name="id" value="">
      <div class="campo">
        <label for="edit-titulo">Título</label>
        <input type="text" id="edit-titulo" name="titulo" required>
      </div>
      <div class="campo">
        <label for="edit-descricao">Descrição</label>
        <textarea id="edit-descricao" name="descricao" rows="6"></textarea>
      </div>
      <div class="modal-actions">
        <button type="button" id="edit-cancel" class="btn ghost">Cancelar</button>
        <button type="submit" class="btn primary">Salvar</button>
      </div>
    </form>
  </div>
  </div>

<script>
(function(){
  var editModal = document.getElementById('edit-modal');
  var editForm = document.getElementById('edit-form');
  function showEdit(){ editModal.classList.add('open'); }
  function hideEdit(){ editModal.classList.remove('open'); }
  document.querySelectorAll('.acao.editar').forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      var id = btn.getAttribute('data-id');
      fetch('index.php?acao=mostrar&id=' + encodeURIComponent(id))
        .then(function(r){ return r.json(); })
        .then(function(data){
          document.getElementById('edit-id').value = data.id || '';
          document.getElementById('edit-titulo').value = data.titulo || '';
          document.getElementById('edit-descricao').value = data.descricao || '';
          showEdit();
        });
    });
  });
  var cancel = document.getElementById('edit-cancel');
  if (cancel) cancel.addEventListener('click', hideEdit);
  if (editModal) editModal.addEventListener('click', function(e){ if (e.target === editModal) hideEdit(); });
  if (editForm) editForm.addEventListener('submit', function(e){
    e.preventDefault();
    var data = new URLSearchParams(new FormData(editForm));
    fetch(editForm.action, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: data.toString() })
      .then(function(r){ if (!r.ok) throw new Error(); return r.text(); })
      .then(function(){ window.location.reload(); });
  });
})();
</script>

