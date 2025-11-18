document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('cameraModal');
    const uploadBtn = document.getElementById('upload');
    const closeBtn = document.querySelector('#cameraModal .close');
    const video = document.getElementById('camera');
    const canvas = document.getElementById('snapshot');
    const uploadFile = document.getElementById('uploadFile');
    const previewContainer = document.getElementById('contendorFoto');

    const imgUpload = document.getElementById('imgUpload');
    const img = document.getElementById('imgTomar');      // botón cámara

    let stream;

    img.addEventListener('click', async (e) => {
        e.preventDefault();
        modal.style.display = 'flex';
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
            await new Promise(resolve => video.onloadedmetadata = () => { video.play(); resolve(); });
        } catch (err) {
            alert("No se pudo acceder a la cámara: " + err.message);
        }
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
        if (stream) stream.getTracks().forEach(track => track.stop());
    });

    // Tomar foto directamente al contenedor de perfil
    document.getElementById('takePhoto').addEventListener('click', () => {
        if (!video.videoWidth || !video.videoHeight) return alert("La cámara aún no está lista.");

        const context = canvas.getContext('2d');
        const targetWidth = 400;
        const targetHeight = Math.round(video.videoHeight / video.videoWidth * targetWidth);
        canvas.width = targetWidth;
        canvas.height = targetHeight;
        context.drawImage(video, 0, 0, targetWidth, targetHeight);

        const dataUrl = canvas.toDataURL('image/png');
        previewContainer.innerHTML = `<img src="${dataUrl}" alt="Foto de usuario">`;

        subirImagenAlServidor(dataUrl);

        modal.style.display = 'none';
        if (stream) stream.getTracks().forEach(track => track.stop());
    });

    imgUpload.addEventListener('click', () => {
        uploadFile.click(); // Solo abre selector de archivo, no el modal
    });

    // Subida desde archivo
    uploadFile.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file && (file.type === "image/png" || file.type === "image/jpeg" || file.type === "image/jpg")) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                previewContainer.innerHTML = `<img src="${evt.target.result}" alt="Foto subida">`;
                modal.style.display = 'none';
                subirImagenAlServidor(evt.target.result);
                if (stream) stream.getTracks().forEach(track => track.stop());
            };
            reader.readAsDataURL(file);
        } else {
            alert("Por favor, sube una imagen .png o .jpg válida.");
        }
    });




    function subirImagenAlServidor(dataUrl) {
        fetch(dataUrl)
            .then(res => res.blob())
            .then(blob => {
                const formData = new FormData();
                formData.append('foto', blob, 'foto.png'); // nombre del archivo

                fetch('/perfil/subir-foto', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if(data.success){
                        console.log('Foto subida correctamente', data.ruta);
                    } else {
                        alert('Error al subir la foto');
                    }
                });
            });
    }
});