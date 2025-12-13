/**
 * Rellenar lista de usuarios al editar un grupo.
 * 
 * Carga los datos del grupo seleccionado en el formulario de edición:
 * - Rellena el nombre del grupo
 * - Carga los usuarios que ya pertenecen al grupo
 * - Configura el formulario para enviar a la URL correcta
 * - Alterna entre vista de crear y editar
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

const grupoCards = document.querySelectorAll('.grupoCard');
const anadirGrupo = document.getElementById('anadir');
const formEditar = document.getElementById('formEditarGrupo');

/**
 * Cargar datos del grupo al hacer click en una tarjeta de grupo.
 */
grupoCards.forEach(card => {
    card.addEventListener('click', function () {
        console.log("CCLLIICCKK");
        const grupoId = card.dataset.id;
        const nombre = card.dataset.nombre;
        const usuarios = JSON.parse(card.dataset.usuarios);

        console.log(card.dataset.url);

        // Configurar la URL del formulario para el grupo específico
        formEditar.action = card.dataset.url;

        // Cambiar de vista crear a editar
        document.getElementById('crearGrupoContainer').style.display = 'none';
        document.getElementById('editarGrupoContainer').style.display = 'block';

        // Rellenar título del grupo
        document.getElementById('tituloGrupoEdit').value = nombre;

        // Rellenar usuarios seleccionados
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

            // Añadir funcionalidad al botón de eliminar
            div.querySelector('.remove-user').addEventListener('click', () => div.remove());

            contenedorUsuarios.appendChild(div);
        });
    });
});

/**
 * Volver a la vista de crear grupo al hacer click en añadir.
 */
anadirGrupo.addEventListener('click', () => {
    document.getElementById('crearGrupoContainer').style.display = 'block';
    document.getElementById('editarGrupoContainer').style.display = 'none';
});