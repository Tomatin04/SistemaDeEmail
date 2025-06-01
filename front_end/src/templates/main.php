<?php $this->layout('layout'); ?>


<!-- Conteúdo principal -->
<main class="main-main">
  <!-- PASTAS -->
  <section class="pastas">
    <h2>Pastas</h2>
    <ul>
      <li><button class="botao azul" onclick="carregarLista('emails')"> CAIXA DE ENTRADA</button></li>
      <li><button class="botao cinza" onclick="carregarLista('rascunhos')"> RASCUNHOS </button></li>
    </ul>
  </section>

  <!-- LISTA DE EMAILS -->
  <section class="lista-emails" id="lista-emails">
    
    <div id="lista"><p>Selecione uma pasta para ver os e-mails.</p></div>
  </section>

  <!-- CONTEÚDO DO EMAIL -->
  <section class="conteudo-email" id="conteudo-email">
    
    <div id="detalhes"><p>Selecione um e-mail para visualizar o conteúdo.</p></div>
  </section>
</main>


<script>
  function carregarLista(option) {
    fetch('/EmailList?option=' + option)
      .then(response => response.text())
      .then(html => {
        document.getElementById('lista').innerHTML = html;

        document.querySelectorAll('#lista li').forEach(item => {
          item.addEventListener('click', () => {
            const id = item.dataset.id;
            const option = item.dataset.option;
            carregarDetalhes(id, option);
          });
        });
      });
  }

  function carregarDetalhes(id, option) {
    fetch(`/Detalhes?id=${id}&option=${option}`)
      .then(response => response.text())
      .then(html => {
        document.getElementById('detalhes').innerHTML = html;
      });
  }
</script>