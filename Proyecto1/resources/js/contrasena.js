document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const passwordConfirmGroup = document.getElementById('passwordConfirmGroup');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    
    if (passwordInput && passwordConfirmGroup) {
        // Ocultar confirmación inicialmente
        passwordConfirmGroup.style.display = 'none';
        
        // Mostrar confirmación cuando la contraseña cumple los requisitos
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
            // Verificar si cumple requisitos mínimos (8 caracteres)
            if (password.length >= 8) {
                passwordConfirmGroup.style.display = 'block';
                setTimeout(() => {
                    passwordConfirmGroup.classList.add('show');
                }, 10);
            } else {
                passwordConfirmGroup.classList.remove('show');
                setTimeout(() => {
                    passwordConfirmGroup.style.display = 'none';
                }, 300);
                passwordConfirmInput.value = ''; // Limpiar confirmación
            }
        });
        
        // Validación en tiempo real de coincidencia
        if (passwordConfirmInput) {
            passwordConfirmInput.addEventListener('input', function() {
                const password = passwordInput.value;
                const confirm = this.value;
                
                if (confirm.length > 0) {
                    if (password === confirm) {
                        this.style.borderColor = 'var(--color-success)';
                        this.style.backgroundColor = '#f0f9f0';
                    } else {
                        this.style.borderColor = 'var(--color-error)';
                        this.style.backgroundColor = '#fef2f2';
                    }
                } else {
                    this.style.borderColor = '#e1e5e9';
                    this.style.backgroundColor = '#fafbfc';
                }
            });
        }
    }
});