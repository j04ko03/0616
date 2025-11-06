document.addEventListener("DOMContentLoaded", () => {
    const abrirCamara = document.getElementById('abrirCamara');
    const modalCamara = document.getElementById('modalCamara');
    const cerrarModal = document.getElementById('cerrarModal');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const hacerFoto = document.getElementById('hacerFoto');
    const imagenInput = document.getElementById('imagenInput');
    const fotoPreview = document.getElementById('fotoPreview');
    const previewContainer = document.getElementById('previewContainer');
    let stream = null;

    // Abrir modal y encender cámara
    abrirCamara.addEventListener('click', async () => {
        modalCamara.style.display = "block";
        previewContainer.style.display = "none";
        fotoPreview.src = "";

        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
        } catch (err) {
            alert("No se pudo acceder a la cámara: " + err);
        }
    });

    // Tomar foto
    hacerFoto.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataURL = canvas.toDataURL('image/png');
        imagenInput.value = dataURL;

        fotoPreview.src = dataURL;
        previewContainer.style.display = "block";
    });

    // Cerrar modal y apagar cámara
    cerrarModal.addEventListener('click', () => {
        modalCamara.style.display = "none";
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
    });

    // Cerrar al hacer clic fuera
    window.addEventListener('click', (event) => {
        if (event.target == modalCamara) {
            modalCamara.style.display = "none";
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        }
    });
});