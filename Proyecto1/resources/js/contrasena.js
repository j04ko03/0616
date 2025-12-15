/**
 * Gestión de visibilidad y validación de contraseñas.
 * 
 * Funcionalidades principales:
 * 1. Toggle para mostrar/ocultar contraseña (cambio entre texto plano y asteriscos)
 * 2. Mostrar campo de confirmación solo cuando la contraseña tiene más de 7 caracteres
 * 3. Validación visual de coincidencia de contraseñas (borde verde/rojo)
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const passwordConfirmGroup = document.getElementById('passwordConfirmGroup');
    const passwordConfirmInput = document.getElementById('password_confirmation');

    /**
     * Configura el toggle de visibilidad para un campo de contraseña.
     * Cambia entre type="password" y type="text", y actualiza el icono del ojo.
     * 
     * @param {string} toggleId - ID del botón de toggle
     * @param {string} inputId - ID del input de contraseña
     */
    function setupPasswordToggle(toggleId, inputId) {
        const toggle = document.getElementById(toggleId);
        const input = document.getElementById(inputId);

        if (toggle && input) {
            const eyeIcon = toggle.querySelector('.eye-icon');

            if (!eyeIcon) {
                console.warn(`No se encontró eye-icon para ${toggleId}`);
                return;
            }

            toggle.addEventListener('click', function () {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                eyeIcon.textContent = isPassword ? '🙉' : '🙈';
                eyeIcon.title = isPassword ? 'Ocultar contraseña' : 'Mostrar contraseña';

                input.classList.toggle('password-visible', isPassword);
            });

            eyeIcon.title = 'Mostrar contraseña';
        }
    }

    // INICIALIZAR TOGGLES
    setupPasswordToggle('passwordToggle', 'password');

    if (document.getElementById('passwordConfirmToggle')) {
        setupPasswordToggle('passwordConfirmToggle', 'password_confirmation');
    }

    // LÓGICA DE CONFIRMACIÓN DE CONTRASEÑA
    if (passwordInput && passwordConfirmGroup) {
        passwordConfirmGroup.style.display = 'none';

        /**
         * Mostrar/ocultar campo de confirmación según longitud de la contraseña.
         */
        passwordInput.addEventListener('input', function () {
            const password = this.value;

            if (password.length > 7) {
                passwordConfirmGroup.style.display = 'block';
                setTimeout(() => {
                    passwordConfirmGroup.classList.add('show');
                }, 10);
            } else {
                passwordConfirmGroup.classList.remove('show');
                setTimeout(() => {
                    passwordConfirmGroup.style.display = 'none';
                }, 10);
                if (passwordConfirmInput) {
                    passwordConfirmInput.value = '';
                }
            }
        });

        /**
         * Validar coincidencia de contraseñas con feedback visual.
         */
        if (passwordConfirmInput) {
            passwordConfirmInput.addEventListener('input', function () {
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