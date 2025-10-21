document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const passwordConfirmGroup = document.getElementById('passwordConfirmGroup');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    
    // ===== FUNCIÓN MEJORADA PARA TOGGLE =====
    function setupPasswordToggle(toggleId, inputId) {
        const toggle = document.getElementById(toggleId);
        const input = document.getElementById(inputId);
        
        if (toggle && input) {
            const eyeIcon = toggle.querySelector('.eye-icon');
            
            if (!eyeIcon) {
                console.warn(`No se encontró eye-icon para ${toggleId}`);
                return;
            }
            
            toggle.addEventListener('click', function() {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                eyeIcon.textContent = isPassword ? '🙉' : '🙈';
                eyeIcon.title = isPassword ? 'Ocultar contraseña' : 'Mostrar contraseña';
                
                // Feedback visual opcional
                input.classList.toggle('password-visible', isPassword);
            });
            
            // Inicializar título
            eyeIcon.title = 'Mostrar contraseña';
        }
    }
    
    // ===== INICIALIZAR TOGGLES =====
    setupPasswordToggle('passwordToggle', 'password');
    
    if (document.getElementById('passwordConfirmToggle')) {
        setupPasswordToggle('passwordConfirmToggle', 'password_confirmation');
    }
    
    // ===== LÓGICA DE CONFIRMACIÓN (igual que la tuya, que está perfecta) =====
    if (passwordInput && passwordConfirmGroup) {
        passwordConfirmGroup.style.display = 'none';
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
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
                if (passwordConfirmInput) {
                    passwordConfirmInput.value = '';
                }
            }
        });

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