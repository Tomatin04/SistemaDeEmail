document.getElementById('menu-btn').addEventListener('click', () => {
  document.getElementById('menu-lateral').classList.toggle('mostrar');
});

function carregarPastas(tipo) {
  fetch(`/emails/${tipo}.php`) // rota do seu backend
    .then(res => res.json())
    .then(emails => {
      const lista = document.getElementById("lista-emails");
      lista.innerHTML = "";

      emails.forEach((email, index) => {
        const item = document.createElement("div");
        item.classList.add("email-item");
        item.innerHTML = `
          <strong>${email.assunto}</strong><br>
          <small>De: ${email.remetente}</small><br>
          <small>${email.data}</small>
        `;
        item.style.cursor = "pointer";
        item.onclick = () => mostrarEmail(email);
        lista.appendChild(item);
      });
    });
}

function mostrarEmail(email) {
  const conteudo = document.getElementById("conteudo-email");
  conteudo.innerHTML = `
    <h3>Assunto: ${email.assunto}</h3>
    <p><strong>De:</strong> ${email.remetente}</p>
    <p><strong>Para:</strong> ${email.destinatario}</p>
    <hr>
    <p>${email.mensagem.replace(/\n/g, "<br>")}</p>
  `;
}
