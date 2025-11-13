const grupoCards = document.querySelectorAll('.grupoCard');
const anadirGrupo = document.getElementById('anadir');
const formEditar = document.getElementById('formEditarGrupo');

grupoCards.forEach(card => {
    card.addEventListener('click', function() {
        console.log("CCLLIICCKK");
        const grupoId = card.dataset.id;
        const nombre = card.dataset.nombre;
        const usuarios = JSON.parse(card.dataset.usuarios);

        console.log(card.dataset.url);

        formEditar.action = card.dataset.url;

        // Ocultar crear grupo y mostrar editar
        document.getElementById('crearGrupoContainer').style.display = 'none';
        document.getElementById('editarGrupoContainer').style.display = 'block';

        // Rellenar título y usuarios seleccionados
        document.getElementById('tituloGrupoEdit').value = nombre;
        const contenedorUsuarios = document.getElementById('usuarios-seleccionados-editar');
        contenedorUsuarios.innerHTML = '';

        usuarios.forEach(u => {
            const div = document.createElement('div');
            div.className = 'usuario-seleccionado';
            div.dataset.id = u.id;
            div.dataset.name = u.nombre;
            div.dataset.tipo = u.tipoUser;
            div.innerHTML = `
                <span>${u.nombre} (${u.tipoUser == 1 ? 'Super Usuario' : 'Usuario normal'})</span>
                <button type="button" class="remove-user">×</button>
                <input type="hidden" name="usuarios[]" value="${u.id}" class="input-usuario-hidden">
            `;
            div.querySelector('.remove-user').addEventListener('click', () => div.remove());
            contenedorUsuarios.appendChild(div);
        });
    });
});

anadirGrupo.addEventListener('click', () => {
    document.getElementById('crearGrupoContainer').style.display = 'block';
    document.getElementById('editarGrupoContainer').style.display = 'none';
});