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

        // Hacer clic para abrir selector de archivos
        capturaBtn.addEventListener('click', e => {
            e.stopPropagation();
            uploadFile.click();
        });

        // Cuando el usuario selecciona una foto
        uploadFile.addEventListener('change', e => {
            const file = e.target.files[0];
            if (!file) return;

            if (!["image/png","image/jpeg","image/jpg"].includes(file.type)) {
                alert("Por favor, sube una imagen .png o .jpg válida.");
                return;
            }

            const idProyecto = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto).id : null;

            const formData = new FormData();
            formData.append('foto', file);
            formData.append('idProyecto', idProyecto);

            fetch(RUTA_SUBIR_FOTO_PRO, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
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

                    

                    // Esperar 1 segundo y recargar solo la imagen
                    setTimeout(() => {
                        //const srcOriginal = imagenProyecto.src.split('?')[0]; // quitar query si existe
                        //imagenProyecto.src = srcOriginal + '?t=' + new Date().getTime(); // añade timestamp para forzar recarga
                        window.location.reload();
                        console.log("Página recargada para actualizar imagen.");
                    }, 3000);

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
