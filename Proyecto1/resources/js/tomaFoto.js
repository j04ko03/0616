const modal = document.getElementById('cameraModal');
const uploadBtn = document.getElementById('upload');
const closeBtn = document.querySelector('.close');
const video = document.getElementById('camera');
const canvas = document.getElementById('snapshot');
const takePhotoBtn = document.getElementById('takePhoto');
const savePhotoBtn = document.getElementById('savePhoto');
const uploadFile = document.getElementById('uploadFile');
const previewContainer = document.getElementById('preview-container');

let stream;

// 📸 Abrir el modal y activar cámara
uploadBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    modal.style.display = 'flex';

    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;

        // Esperar a que el video esté listo antes de capturar
        await new Promise(resolve => {
            video.onloadedmetadata = () => {
                video.play();
                resolve();
            };
        });
    } catch (err) {
        alert("No se pudo acceder a la cámara: " + err.message);
    }
});

// ❌ Cerrar modal
closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
});

// 📸 Tomar foto
takePhotoBtn.addEventListener('click', () => {
    if (video.videoWidth === 0 || video.videoHeight === 0) {
        alert("La cámara aún no está lista. Espera un segundo y vuelve a intentarlo.");
        return;
    }

    const context = canvas.getContext('2d');

    // 🔹 Tamaño más pequeño real (por ejemplo, 200x150 px)
    const targetWidth = 400;
    const targetHeight = Math.round(video.videoHeight / video.videoWidth * targetWidth);

    canvas.width = targetWidth;
    canvas.height = targetHeight;

    // Dibujar el video escalado
    context.drawImage(video, 0, 0, targetWidth, targetHeight);

    // Mostrar la foto y el botón de guardar
    canvas.style.display = 'block';
    savePhotoBtn.style.display = 'inline-block';
});

// 💾 Guardar foto tomada
savePhotoBtn.addEventListener('click', () => {
    const imgData = canvas.toDataURL('image/png');
    previewContainer.innerHTML = `<img src="${imgData}" alt="Foto de usuario">`;
    modal.style.display = 'none';

    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
});

// 🖼️ Subir imagen desde archivo
uploadFile.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file && (file.type === "image/png" || file.type === "image/jpeg")) {
        const reader = new FileReader();
        reader.onload = function(evt) {
            previewContainer.innerHTML = `<img src="${evt.target.result}" alt="Foto subida">`;
            modal.style.display = 'none';
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        };
        reader.readAsDataURL(file);
    } else {
        alert("Por favor, sube una imagen .png o .jpg válida.");
    }
});

console.log(video.videoWidth, video.videoHeight);