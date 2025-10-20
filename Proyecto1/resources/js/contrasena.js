document.getElementById('password').addEventListener('input', function() {
        const passwordConfirmGroup = document.getElementById('passwordConfirmGroup');
        if (this.value.length > 0) {
            passwordConfirmGroup.style.display = 'block';
            // Animación suave
            setTimeout(() => {
                passwordConfirmGroup.style.opacity = '1';
                passwordConfirmGroup.style.transform = 'translateY(0)';
            }, 10);
        } else {
            passwordConfirmGroup.style.display = 'none';
        }
    });

    // Validación en tiempo real de contraseñas
    document.getElementById('password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirm = this.value;
        
        if (confirm && password !== confirm) {
            this.style.borderColor = 'var(--color-error)';
            this.style.background = '#fef2f2';
        } else {
            this.style.borderColor = 'var(--color-success)';
            this.style.background = '#f0f9f0';
        }
    });