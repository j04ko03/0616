/**
 * Subida de fotografía para proyectos desde selector de archivos.
 * 
 * Permite subir una imagen para cada proyecto desde las tarjetas de proyecto.
 * Funcionalidades:
 * - Selección de imagen (.png, .jpg, .jpeg)
 * - Subida al servidor mediante fetch con FormData
 * - Recarga automática de la página para mostrar la nueva imagen
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card-contenedor');

    cards.forEach(card => {


        // Evitar añadir listeners duplicados
        if (card.dataset.fotoListenerAdded) return;
        card.dataset.fotoListenerAdded = 'true';

        const contenedorFoto = card.querySelector('.contenedorFotoProyecto');
        if (!contenedorFoto) return;

        const capturaBtn = contenedorFoto.querySelector('.capturaProyecto');
        const uploadFile = contenedorFoto.querySelector('.subirArchivo');
        const imagenProyecto = contenedorFoto.querySelector('.imagen-proyecto');
        if (!capturaBtn || !uploadFile || !imagenProyecto) return;

        /**
         * Abrir selector de archivos al hacer click en el botón de captura.
         */
        capturaBtn.addEventListener('click', e => {
            e.stopPropagation();
            uploadFile.click();
        });

        /**
         * Procesar archivo seleccionado y subirlo al servidor.
         */
        uploadFile.addEventListener('change', e => {
            e.stopPropagation();
            const file = e.target.files[0];
            if (!file) return;

            if (!["image/png", "image/jpeg", "image/jpg"].includes(file.type)) {
                alert("Por favor, sube una imagen .png o .jpg válida.");
                return;
            }

            const idProyecto = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto).id : null;

            const formData = new FormData();
            formData.append('foto', file);
            formData.append('idProyecto', idProyecto);

            /**
             * Enviar imagen al servidor mediante fetch.
             */
            if (typeof RUTA_SUBIR_FOTO_PRO === 'undefined') {
                console.error("RUTA_SUBIR_FOTO_PRO no definida.");
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            const headers = {};
            if (csrfToken) headers['X-CSRF-TOKEN'] = csrfToken.getAttribute('content');

            fetch(RUTA_SUBIR_FOTO_PRO, {
                method: 'POST',
                headers: headers,
                body: formData
            })
                .then(async res => {
                    const text = await res.text();

                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.error("Respuesta del servidor NO JSON:", text);
                        throw new Error("Servidor no devolvió JSON válido.");
                    }
                })
                .then(data => {
                    if (data.success) {
                        console.log("Foto subida correctamente:", data.ruta);
                        imagenProyecto.src = data.ruta; // mostrar foto subida



                        // Recargar página después de 2 segundos para mostrar nueva imagen
                        setTimeout(() => {
                            window.location.reload();
                            console.log("Página recargada para actualizar imagen.");
                        }, 2000);

                    } else {
                        alert("Error al subir la foto: " + data.mensaje);
                    }
                })
                .catch(err => {
                    console.error("ERROR FETCH:", err);
                });
        });
    });
});
